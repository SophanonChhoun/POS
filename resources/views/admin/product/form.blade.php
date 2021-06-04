<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Product</div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('name')}">
                    <label class="control-label">
                        Name
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="name"
                           v-model="data.name"
                           data-vv-as="Name"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Name">
                    <span class="help-block">@{{ errors.first('name') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('subcategory_id')}">
                    <label class="control-label">
                        Sub Category
                        <span style="color: red">*</span>
                    </label>
                    <single-select
                        v-model="data.subcategory_id"
                        :options="subcategories"
                        track-by="id"
                        label="Sub Categories"
                        name="subcategory_id"
                        :custom-label-fields="['description']"
                        :allow-empty="false"
                        v-validate="'required'"
                        data-vv-as="Sub Category"
                    ></single-select>
                    <span class="help-block">@{{ errors.first('subcategory_id') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('price')}">
                    <label class="control-label">
                        Price
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="price"
                           v-model="data.price"
                           data-vv-as="Price"
                           v-validate="'required|decimal'"
                           class="form-control"
                           placeholder="Price">
                    <span class="help-block">@{{ errors.first('price') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('sequence_order')}">
                    <label class="control-label">
                        Order
                        <span style="color: red">*</span>
                    </label>
                    <input type="number"
                           name="sequence_order"
                           v-model="data.sequence_order"
                           data-vv-as="Sequence Order"
                           v-validate="'required|integer'"
                           class="form-control"
                           placeholder="Sequence Order">
                    <span class="help-block">@{{ errors.first('sequence_order') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('quantity')}">
                    <label class="control-label">
                        Quantity
                        <span style="color: red">*</span>
                    </label>
                    <input type="number"
                           name="quantity"
                           v-model="data.quantity"
                           data-vv-as="Quantity"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Quantity">
                    <span class="help-block">@{{ errors.first('quantity') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('type')}">
                    <label class="control-label">
                        Type
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="type"
                           v-model="data.type"
                           data-vv-as="Type"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Type">
                    <span class="help-block">@{{ errors.first('type') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('brand')}">
                    <label class="control-label">
                        Brand
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="brand"
                           v-model="data.brand"
                           data-vv-as="Brand"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Brand">
                    <span class="help-block">@{{ errors.first('brand') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('country')}">
                    <label class="control-label">
                        Country
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="country"
                           v-model="data.country"
                           data-vv-as="Country"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Country">
                    <span class="help-block">@{{ errors.first('country') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('item_class')}">
                    <label class="control-label">
                        Item Class
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="item_class"
                           v-model="data.item_class"
                           data-vv-as="Item Class"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Item Class">
                    <span class="help-block">@{{ errors.first('item_class') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('video_url')}">
                    <label class="control-label">
                        Video Url
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="video_url"
                           v-model="data.video_url"
                           data-vv-as="Video Url"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Video Url">
                    <span class="help-block">@{{ errors.first('video_url') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('is_enable')}">
                    <label class="control-label">
                        Status
                        <span style="color: red">*</span>
                    </label>
                    <input type="checkbox"
                           style="margin-left: 1%"
                           name="is_enable"
                           v-model="data.is_enable"
                           data-vv-as="Status"
                           v-validate="'required'"
                    >
                    <span class="help-block">@{{ errors.first('is_enable') }}</span>
                </div>

                @if(request()->is("admin/product/create"))
                    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('profile')}">
                        <label class="control-label">
                            Default Image
                            <span style="color: red">*</span>
                        </label>
                        <single-image-uploader
                            :error="data.error_image"
                            label="{{ __('Icon') }}"
                            ph="400"
                            pw="400"
                            default-image="{{ asset('image/noimage.png') }}"
                            :image="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}')"
                            v-model="data.image"
                            :name="'profile'"
                            v-validate="'required'"
                            data-vv-as="Default Image"
                        ></single-image-uploader>
                        <span class="help-block">@{{ errors.first('profile') }}</span>
                    </div>
                @else
                    <div class="form-group col-lg-12">
                        <label class="control-label">
                            Default Image
                            <span style="color: red">*</span>
                        </label>
                        <single-image-uploader
                            :error="data.error_image"
                            label="{{ __('Icon') }}"
                            ph="400"
                            pw="400"
                            default-image="{{ asset('image/noimage.png') }}"
                            :image="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}')"
                            v-model="data.image"
                            :name="'profile'"
                        ></single-image-uploader>
                    </div>
                @endif

                <div class="row">
                    <div v-for="(image, index) in data.medias" class="col-lg-3">
                        <div class="portlet blue box">
                            <div class="portlet-title">
                                <div class="caption"><i class="icon-picture"></i>Image</div>

                                <div class="tools">
                                    <a href="javascript:;" @click="removeMedias(index)">
                                        <button>X</button>
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <single-image-uploader
                                    default-image="{{ asset('image/noimage.png') }}"
                                    :image="image.image ? image.image : ( image.file_url ? image.file_url : '{{asset('image/noimage.png')}}' ) "
                                    v-model="image.image"
                                    name="thumbnail"
                                    ph="200"
                                    pw="200"
                                ></single-image-uploader>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="button" class="btn btn-primary" @click="addMedias()">Add Image</button>
                </div>

                <div v-if="error">
                    @include('admin.layout.message')
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
