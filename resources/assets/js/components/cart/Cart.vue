<template lang="html">
    <div>
        <div v-if="Object.keys(cart).length > 0">
            <div class="col-xs-12 col-md-8">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Eliminar</th>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="product in cart">
                            <td>
                                <button @click="deleteProduct(product.slug)" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </button>
                            </td>
                            <td class="muted center_text">
                                <img class="img-responsive" :src="product.image">
                            </td>
                            <td>{{ product.name }}</td>
                            <td class="text-center">
                                <input class="input-mini" type="number" min="1" max="10" :value="product.quantity" @click="changeQuantity(product.slug, $event)">
                            </td>
                            <td>{{ product.price }}€</td>
                            <td>{{ (product.price * product.quantity).toFixed(2) }}€</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><strong>{{ total.toFixed(2) }}€</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row" style="padding-bottom: 20px;">
                    <div class="col-xs-12 col-md-12">
                        <a href="/cart/remove">
                            <button class="btn btn-primary pull-left">
                                Vaciar carrito
                            </button>
                        </a>
                        <a href="/" style="padding-left: 20px;">
                            <button class="btn btn-success">
                                Seguir comprando
                            </button>
                        </a>
                        <template v-if="user">
                            <a href="/payment">
                                <button class="btn btn-success pull-right">
                                    <i class="fa fa-paypal"></i>
                                    Pagar
                                </button>
                            </a>
                        </template>
                        <template v-else>
                            <a href="/login">
                                <button class="btn btn-success pull-right">
                                    Continuar
                                </button>
                            </a>
                        </template>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3 col-md-offset-1 well">
                <h3>Resumen de compra</h3>
                <small class="text-muted">Gastos envío estimados: 5,75€</small>
                <hr/>
                <div v-if="user">
                    <h5>Nombre:</h5>
                    <small class="text-muted">{{ user.name }}</small>
                    <h5>Dirección:</h5>
                    <small class="text-muted">{{ user.address }}</small>
                    <h5>email:</h5>
                    <small class="text-muted">{{ user.email }}</small>
                    <hr>
                </div>
                <h4>Total: {{ total.toFixed(2) }}€</h4>
            </div>
        </div>
        <div v-if="Object.keys(cart).length == 0" class="col-xs-12 col-md-12 text-center">
            <h1>No hay items en el carrito.</h1>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user', 'initialCart', 'initialTotal'],
        data () {
            return {
                cart: this.initialCart,
                total: this.initialTotal,
            }
        },
        methods: {
            deleteProduct (slug) {
                axios.post(`/cart/delete/${slug}`).then(response => {
                    this.cart = response.data.cart
                    this.total = response.data.total

                    if (response.data.itemsQuantity > 0) {
                        $('.badge').html(response.data.itemsQuantity)
                    } else {
                        $('.badge').hide()
                    }

                })
            },

            changeQuantity (slug, event) {
                axios.post(`/cart/update/${slug}/${event.currentTarget.value}`).then(response => {
                    this.cart = response.data.cart
                    this.total = response.data.total
                    $('.badge').html(response.data.itemsQuantity)
                })
            },
        }
    }
</script>

<style lang="css">

</style>