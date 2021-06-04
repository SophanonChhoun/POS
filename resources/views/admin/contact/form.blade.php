<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Contact Location</div>
        </div>
        <div class="portlet-body">

            <div class="from-group row p-b-20" >
                <div class="col-md-12">
                    <single-image-uploader
                        ph="200"
                        pw="300"
                        default-image="{{ asset('image/noimage.png') }}"
                        data-vv-as="Image"
                        :image="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}')"
                        v-model="data.image"
                        :name="'image'"
                    ></single-image-uploader>
                </div>
            </div>

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
            </div>
            <div class="row">
                <div class="form-group col-lg-6" :class="{'has-error' : errors.first('phone_number')}">
                    <label class="control-label">
                        Phone Number
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="phone_number"
                           v-model="data.phone_number"
                           data-vv-as="Phone Number"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Phone Number">
                    <span class="help-block">@{{ errors.first('phone_number') }}</span>
                </div>
                <div class="form-group col-lg-6" :class="{'has-error' : errors.first('email')}">
                    <label class="control-label">
                        Email
                        <span style="color: red">*</span>
                    </label>
                    <input type="email"
                           name="email"
                           v-model="data.email"
                           data-vv-as="Email"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Email">
                    <span class="help-block">@{{ errors.first('email') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6" :class="{'has-error' : errors.first('latitude')}">
                    <label class="control-label">
                        Latitude
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="latitude"
                           v-model="data.latitude"
                           data-vv-as="Latitude"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Latitude">
                    <span class="help-block">@{{ errors.first('latitude') }}</span>
                </div>
                <div class="form-group col-lg-6" :class="{'has-error' : errors.first('longitude')}">
                    <label class="control-label">
                        Longitude
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="longitude"
                           v-model="data.longitude"
                           data-vv-as="Longitude"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Longitude">
                    <span class="help-block">@{{ errors.first('longitude') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('address')}">
                    <label class="control-label">
                        Address
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="address"
                           v-model="data.address"
                           data-vv-as="Address"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Address">
                    <span class="help-block">@{{ errors.first('address') }}</span>
                </div>
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
            <div v-if="error">
                @include('admin.layout.message')
            </div>
        </div>
    </div>
</div>
