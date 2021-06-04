<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Buyer</div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('first_name')}">
                    <label class="control-label">
                        First Name
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="first_name"
                           v-model="data.first_name"
                           data-vv-as="First Name"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="First Name">
                    <span class="help-block">@{{ errors.first('first_name') }}</span>
                </div>
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('last_name')}">
                    <label class="control-label">
                        Last Name
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="last_name"
                           v-model="data.last_name"
                           data-vv-as="Last Name"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Last Name">
                    <span class="help-block">@{{ errors.first('last_name') }}</span>
                </div>

                <div class="form-group col-lg-12">
                    <label class="control-label">
                        Phone Number
                    </label>
                    <input type="text"
                           name="phone_number"
                           v-model="data.phone_number"
                           class="form-control"
                           placeholder="Phone Number">
                </div>

                <div class="form-group col-lg-12" >
                    <label class="control-label">
                        Address
                    </label>
                    <input type="text"
                           name="address"
                           v-model="data.address"
                           class="form-control"
                           placeholder="Address">
                </div>

                <div class="form-group col-lg-12" >
                    <label class="control-label">
                        Profile
                    </label>
                    <single-image-uploader
                        label="Profile"
                        ph="400"
                        pw="300"
                        default-image="{{ asset('image/noimage.png') }}"
                        :image="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}')"
                        v-model="data.image"
                        :name="'profile'"
                        v-validate="{required: data.image ? true : false}"
                    ></single-image-uploader>
                </div>
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('is_enable')}">
                    <label class="control-label">
                        Status
                        <span style="color: red">*</span>
                    </label>
                    <input type="checkbox"
                           style="margin-left: 2%"
                           name="is_enable"
                           v-model="data.is_enable"
                           data-vv-as="Status"
                           v-validate="'required'"
                    >
                    <span class="help-block">@{{ errors.first('is_enable') }}</span>
                </div>
                <div v-if="error">
                    @include('admin.layout.message')
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
