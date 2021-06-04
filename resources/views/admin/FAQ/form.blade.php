<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>FAQ</div>
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
                           v-model="data.order"
                           data-vv-as="Order"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Sequence Order">
                    <span class="help-block">@{{ errors.first('sequence_order') }}</span>
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
                <br>
            </div>
        </div>
    </div>
</div>
