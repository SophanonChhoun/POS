<div class="row">
    <div class="col-lg-8">
        <div class="portlet blue box">
            <div class="portlet-title">
                <div class="caption"><i class="icon-picture"></i>Sale</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('buyer_id')}">
                        <label class="control-label">
                            Buyer
                            <span style="color: red">*</span>
                        </label>
                        <single-select
                            v-model="data.buyer_id"
                            :options="buyers"
                            track-by="id"
                            label="Buyer"
                            name="buyer_id"
                            :custom-label-fields="['name']"
                            :allow-empty="false"
                            v-validate="'required'"
                            data-vv-as="Buyer"
                        ></single-select>
                        <span class="help-block">@{{ errors.first('buyer_id') }}</span>
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
                                        <multiselect :name="'product_id' + index"
                                                     v-model="product.product"
                                                     deselect-label="Can't remove this value"
                                                     track-by="name"
                                                     label="name"
                                                     placeholder="Select one"
                                                     :options="products"
                                                     data-vv-as="Products"
                                                     v-validate="'required'"
                                                     :allow-empty="false"
                                                     @select="setProduct($event, index)"
                                        >
                                        </multiselect>
                                        <span class="help-block">@{{ errors.first('product_id' + index) }}</span>
                                    </div>
                                    @if(request()->is('admin/sale/create'))
                                        <div class="form-group col-lg-3" :class="{'has-error' : errors.first('quantity' + index)}">
                                            <label class="control-label">
                                                Quantity
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="number"
                                                   :name="'quantity' + index"
                                                   v-model="product.quantity"
                                                   data-vv-as="Quantity"
                                                   v-validate="'required|max_value: ' + getProductQuantity(product.product_id) "
                                                   class="form-control"
                                                   placeholder="Quantity">
                                            <span class="help-block">@{{ errors.first('quantity' + index) }}</span>
                                    @else
                                            <div class="form-group col-lg-3" >
                                                <label class="control-label">
                                                    Quantity
                                                </label>
                                                <input type="number"
                                                       :name="'quantity' + index"
                                                       v-model="product.quantity"
                                                       data-vv-as="Quantity"
                                                       class="form-control"
                                                       placeholder="Quantity">
                                    @endif
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label class="control-label">
                                            Price
                                        </label>
                                        <input type="text"
                                               :value="getProductPrice(product.product_id, index)"
                                               class="form-control"
                                               disabled
                                        >
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
                    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('promotion_id')}">
                        <label class="control-label">
                            Promotion Code
                        </label>
                        <single-select
                            v-model="data.promotion_id"
                            :options="promotions"
                            track-by="id"
                            label="Promotion"
                            name="promotion_id"
                            :custom-label-fields="['code']"
                            :allow-empty="true"
                        ></single-select>
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
                            Delivered
                        </label>
                        <input type="checkbox"
                               style="margin-left: 1%"
                               name="delivered"
                               v-model="data.delivered"
                        >
                    </div>
                    <div class="form-group col-lg-12" v-if="data.delivered">
                        <label class="control-label" :class="{'has-error' : errors.first('delivered_at')}">
                            Delivered At
                            <span style="color: red">*</span>
                        </label>
                        <input type="date"
                               style="margin-left: 1%"
                               name="delivered_at"
                               v-model="data.delivered_at"
                               v-validate="'required'"
                               data-vv-as="Delivered Date"
                        >
                        <span class="help-block">@{{ errors.first('delivered_at') }}</span>
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
                                <td>@{{ getProductPrice(product.product_id) * product.quantity }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Total Quantity</td>
                                <td>@{{ getQuantity() }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Total Price in USD</td>
                                <td>$@{{ getTotal()  }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Total Price in Riel</td>
                                <td>R@{{ getTotal() * data.currency  }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Total After Discount in USD</td>
                                <td>$@{{ getTotalDiscount() }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Total After Discount in Riel</td>
                                <td>R@{{ getTotalDiscount() * data.currency }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
