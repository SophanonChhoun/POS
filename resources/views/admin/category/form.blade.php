<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Category</div>
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

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('sequence_order')}">
                    <label class="control-label">
                        Order
                        <span style="color: red">*</span>
                    </label>
                    <input type="number"
                           name="sequence_order"
                           v-model="data.sequence_order"
                           data-vv-as="Sequence Order"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Sequence Order">
                    <span class="help-block">@{{ errors.first('sequence_order') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('background_color')}">
                    <label class="control-label">
                        Background Color
                        <span style="color: red">*</span>
                    </label>
                    <input type="color"
                           name="background_color"
                           v-model="data.background_color"
                           style="margin-left: 1%"
                           data-vv-as="Background Color"
                           v-validate="'required'"
                           class="form-control-sm"
                           placeholder="background_color">
                    <span class="help-block">@{{ errors.first('background_color') }}</span>
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
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('display_discount')}">
                    <label class="control-label">
                        Display Discount
                        <span style="color: red">*</span>
                    </label>
                    <input type="checkbox"
                           style="margin-left: 1%"
                           name="display_discount"
                           v-model="data.display_discount"
                           data-vv-as="Disply discount"
                           v-validate="'required'"
                    >
                    <span class="help-block">@{{ errors.first('display_discount') }}</span>
                </div>
                <div class="form-group col-lg-12" :class="{'has-error' : error_image}">
                    <label class="control-label">
                        Image
                        <span style="color: red">*</span>
                    </label>
                    <single-image-uploader
                        :error="data.error_image"
                        label="{{ __('Icon') }}"
                        ph="200"
                        pw="200"
                        default-image="{{ asset('image/noimage.png') }}"
                        :image="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}')"
                        v-model="data.image"
                        :name="'profile'"
                        v-validate="{required: data.image ? true : false}"
                        data-vv-as="Profile"
                    ></single-image-uploader>
                    <span class="help-block">@{{ error_image }}</span>
                </div>

                <div v-if="error">
                    @include('admin.layout.message')
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
