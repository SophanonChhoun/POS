<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Sub Category</div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('description')}">
                    <label class="control-label">
                        Description
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="description"
                           v-model="data.description"
                           data-vv-as="Description"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Description">
                    <span class="help-block">@{{ errors.first('description') }}</span>
                </div>
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('category_id')}">
                    <label class="control-label">
                        Category
                        <span style="color: red">*</span>
                    </label>
                    <single-select
                        v-model="data.category_id "
                        :options="categories"
                        track-by="id"
                        label="Category"
                        name="category_id"
                        :custom-label-fields="['name']"
                        :allow-empty="false"
                        v-validate="'required'"
                        data-vv-as="Category"
                    ></single-select>
                    <span class="help-block">@{{ errors.first('category_id') }}</span>

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
