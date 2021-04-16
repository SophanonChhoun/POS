<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Template</div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="form-group col-lg-12" :class="{'has-error' : error_image}">
                    <label class="control-label">
                        Image
                        <span style="color: red">*</span>
                    </label>
                    <single-image-uploader
                        :error="data.error_image"
                        label="{{ __('general.image') }}"
                        ph="500"
                        pw="400"
                        default-image="{{ asset('image/noimage.png') }}"
                        :image="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}')"
                        v-model="data.image"
                        :name="'profile'"
                        v-validate="{required: data.image ? true : false}"
                        data-vv-as="Profile"
                    ></single-image-uploader>
                    <span class="help-block">@{{ error_image }}</span>
                </div>
                <div class="form-group col-lg-12">
                    <label class="control-label">
                        Status
                    </label>
                    <input type="checkbox"
                           style="margin-left: 2%"
                           name="is_enable"
                           v-model="data.is_enable"
                    >
                </div>

                <br>
            </div>
        </div>
    </div>
</div>
