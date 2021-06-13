<div class="row">
    <div class="col-lg-8">
        <div class="portlet blue box">
            <div class="portlet-title">
                <div class="caption"><i class="icon-picture"></i>Import</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('dealer_id')}">
                        <label class="control-label">
                            Dealer
                            <span style="color: red">*</span>
                        </label>
                        <single-select
                            v-model="data.dealer_id"
                            :options="dealers"
                            track-by="id"
                            label="Dealer"
                            name="dealer_id"
                            :custom-label-fields="['name']"
                            :allow-empty="false"
                            v-validate="'required'"
                            data-vv-as="Dealer"
                        ></single-select>
                        <span class="help-block">@{{ errors.first('dealer_id') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div v-for="(product, index) in data.products" class="col-lg-12">
                        <div class="portlet blue box">
                            <div class="portlet-title">
                                <div class="caption"><i class="icon-picture"></i>Product</div>

                                <div class="tools">
                                    <a href="javascript:;" @click="removeProducts(index)">
                                        <button>X</button>
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="form-group col-lg-6" :class="{'has-error' : errors.first('product_id' + index)}">
                                        <label class="control-label">
                                            Product
                                            <span style="color: red">*</span>
                                        </label>
                                        <single-select
                                            v-model="product.product_id"
                                            :options="products"
                                            track-by="id"
                                            label="Product"
                                            :name="'product_id' + index"
                                            :custom-label-fields="['name']"
                                            :allow-empty="false"
                                            v-validate="'required'"
                                            data-vv-as="Product"
                                        ></single-select>
                                        <span class="help-block">@{{ errors.first('product_id' + index) }}</span>
                                    </div>
                                    <div class="form-group col-lg-3" :class="{'has-error' : errors.first('quantity' + index)}">
                                        <label class="control-label">
                                            Quantity
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="number"
                                               :name="'quantity' + index"
                                               v-model="product.quantity"
                                               data-vv-as="Quantity"
                                               v-validate="'required'"
                                               class="form-control"
                                               placeholder="Quantity">
                                        <span class="help-block">@{{ errors.first('quantity' + index) }}</span>
                                    </div>
                                    <div class="form-group col-lg-3" :class="{'has-error' : errors.first('price' + index)}">
                                        <label class="control-label">
                                            Price
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text"
                                               :name="'price' + index"
                                               v-model="product.price"
                                               data-vv-as="Price"
                                               v-validate="'required|decimal'"
                                               class="form-control"
                                               placeholder="Price">
                                        <span class="help-block">@{{ errors.first('price' + index) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <button type="button" class="btn btn-primary" @click="addProducts()">Add Product</button>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label class="control-label">
                            Paid
                        </label>
                        <input type="checkbox"
                               style="margin-left: 1%"
                               name="paid"
                               v-model="data.paid"
                        >
                    </div>
                    <div class="form-group col-lg-12" v-if="data.paid">
                        <label class="control-label" :class="{'has-error' : errors.first('paid_at')}">
                            Paid At
                            <span style="color: red">*</span>
                        </label>
                        <input type="date"
                               style="margin-left: 1%"
                               name="paid_at"
                               v-model="data.paid_at"
                               v-validate="'required'"
                               data-vv-as="Paid Date"
                        >
                        <span class="help-block">@{{ errors.first('paid_at') }}</span>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="control-label">
                            Arrived
                        </label>
                        <input type="checkbox"
                               style="margin-left: 1%"
                               name="arrived"
                               v-model="data.arrived"
                        >
                    </div>
                    <div class="form-group col-lg-12" v-if="data.arrived">
                        <label class="control-label" :class="{'has-error' : errors.first('arrived_at')}">
                            Arrived At
                            <span style="color: red">*</span>
                        </label>
                        <input type="date"
                               style="margin-left: 1%"
                               name="arrived_at"
                               v-model="data.arrived_at"
                               v-validate="'required'"
                               data-vv-as="Arrived Date"
                        >
                        <span class="help-block">@{{ errors.first('arrived_at') }}</span>
                    </div>

                    <div v-if="error">
                        @include('admin.layout.message')
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4" v-if="data.products.length >= 1">
        <div class="portlet blue box">
            <div class="portlet-title">
                <div class="caption"><i class="icon-picture"></i>Receipt</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-responsive table-hover table-bordered">
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            <tr v-for="product in data.products">
                                <td>@{{ getProductName(product.product_id) }}</td>
                                <td>@{{ product.quantity }}</td>
                                <td>@{{ product.price }}</td>
                                <td>@{{ product.price * product.quantity }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Total Quantity</td>
                                <td>@{{ getQuantity() }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Total Price in USD</td>
                                <td>$@{{ getTotal() }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Total Price in Riel</td>
                                <td>R@{{ getTotal() * data.currency }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
