<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>FAQ Question</div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('category_id')}">
                    <label class="control-label">
                        FAQ Category
                        <span style="color: red">*</span>
                    </label>
                    <single-select
                        v-model="data.category_id "
                        :options="faqs"
                        track-by="id"
                        label="Category"
                        name="category_id"
                        :custom-label-fields="['name']"
                        :allow-empty="false"
                        v-validate="'required'"
                        data-vv-as="FAQ Category"
                    ></single-select>
                    <span class="help-block">@{{ errors.first('category_id') }}</span>

                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('question')}">
                    <label class="control-label">
                        Question
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="question"
                           v-model="data.question"
                           data-vv-as="Question"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Question">
                    <span class="help-block">@{{ errors.first('question') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('answer')}">
                    <label class="control-label">
                        Answer
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="answer"
                           v-model="data.answer"
                           data-vv-as="Answer"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Answer">
                    <span class="help-block">@{{ errors.first('answer') }}</span>
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
