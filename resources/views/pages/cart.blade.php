@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <div class="page-content page-cart">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-cart">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                                <tr>
                                    <td>Image</td>
                                    <td>Item</td>
                                    <td>Price</td>
                                    <td>Banyak</td>
                                    <td>Sub Total</td>
                                    <td>Menu</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td style="width: 25%">
                                            @if ($cart->product->galleries)
                                                <img src="{{ Storage::url($cart->product->galleries->first()->photo) }}"
                                                    alt="Image Product" class="cart-image" />
                                            @endif
                                        </td>
                                        <td style="width: 35%">
                                            <div class="product-title">{{ $cart->product->name }}</div>
                                        </td>
                                        <td style="width: 35%">
                                            @if ($cart->product->discount > 0)
                                                <div class="product-title">
                                                    Rp.{{ number_format($cart->product->price - ($cart->product->price * $cart->product->discount) / 100) }}
                                                </div>
                                                <div class="product-subtitle">
                                                    <del>Rp.{{ number_format($cart->product->price) }}</del>
                                                </div>
                                            @else
                                                <div class="product-title">
                                                    Rp.{{ number_format($cart->product->price) }}
                                                </div>
                                            @endif
                                        </td>
                                        <td style="width: 5%">
                                            <input type="number"
                                                onchange="updateSubTotal({{ $cart->product->price - ($cart->product->price * $cart->product->discount) / 100 }},this.value,'#id_sku_{{ $cart->product_id }}','{{ $cart->id }}')"
                                                name="quantity" value="{{ $cart->quantity }}">
                                        </td>
                                        <td style="width: 45%">
                                            <div id="id_sku_{{ $cart->product_id }}" class="product-title subTotal">
                                                Rp.{{ number_format(($cart->product->price - ($cart->product->price * $cart->product->discount) / 100) * $cart->quantity) }}
                                            </div>
                                        </td>
                                        <td style="width: 20%">
                                            <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-remove-cart">
                                                    Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        if ($cart->product->discount > 0) {
                                            $totalPrice += ($cart->product->price - ($cart->product->price * $cart->product->discount) / 100) * $cart->quantity;
                                        } else {
                                            $totalPrice += $cart->product->price * $cart->quantity;
                                        }
                                        
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                </div>
                <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" id="total_price" name="total_price" value="{{ $totalPrice }}">
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <h2>Payment Informations</h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-4 col-md-2">
                            <div class="product-title">$0,00</div>
                            <div class="product-subtitle">Country Tax</div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="product-title">$0,00</div>
                            <div class="product-subtitle">Product Insurance</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title">$0,00</div>
                            <div class="product-subtitle">Ship to Jakarta</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div id="total_cart" class="product-title text-success">
                                Rp.{{ number_format($totalPrice ?? 0) }}</div>
                            <div class="product-subtitle">Total</div>
                        </div>
                        <div class="col-8 col-md-3">
                            <button type="submit" class="btn btn-success mt-4 px-4 btn-block">Checkout Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>

    <script>
        function number_format(number, decimals, decPoint, thousandsSep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
            var n = !isFinite(+number) ? 0 : +number
            var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
            var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
            var s = ''

            var toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec)
                return '' + (Math.round(n * k) / k)
                    .toFixed(prec)
            }

            // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || ''
                s[1] += new Array(prec - s[1].length + 1).join('0')
            }

            return s.join(dec)
        }

        function updateSubTotal(harga, quantity, id, cart_id) {

            let subtotal = harga * quantity;

            let final = number_format(subtotal, ",", ",", ",");

            console.log("cart", cart_id);

            axios.post('{{ url('api/updateQtyCart') }}/' + cart_id, {



                quantity: parseInt(quantity),

            }).then(res => {
                console.log(res)
            });

            $(id).html(
                "Rp." + final
            );

            const subtotals = $(".subTotal");


            let finalTotal = 0;

            subtotals.map((e, i) => {

                let total = subtotals[e].innerHTML
                var res = total.replace(/\D/g, "");
                // console.log();

                finalTotal += parseInt(res)

            })

            $("#total_cart").html("Rp." + number_format(finalTotal, ",", ",", ","))
            $("#total_price").val(finalTotal)




        }
    </script>
@endpush
