<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Promotion</div>
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
                        Title
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="name"
                           v-model="data.title"
                           data-vv-as="Title"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Title">
                    <span class="help-block">@{{ errors.first('name') }}</span>
                </div>
            </div>

            <div class="row">
                <div class="control-label col-md-3 m-t-10">
                    <label>
                        <input type="checkbox" v-model="data.discount">
                        <span></span>
                    </label>
                    <label class="control-label">Give Discount
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-12" v-if="!data.discount">
                    <label class="control-label">
                        Reduce Cost
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="cost"
                           v-model="data.cost"
                           class="form-control"
                           placeholder="Cost">
                </div>
                <div class="form-group col-lg-12" v-if="data.discount">
                    <label class="control-label">
                        Discount Percentage
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="discount_percentage"
                           v-model="data.discount_percentage"
                           class="form-control"
                           placeholder="Discount Percentage">
                    <span class="help-block">@{{ errors.first('discount_percentage') }}</span>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('code')}">
                    <label class="control-label">
                        Code
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="code"
                           v-model="data.code"
                           class="form-control"
                           v-validate="'required'"
                           data-vv-as="Code"
                           placeholder="Code">
                    <span class="help-block">@{{ errors.first('code') }}</span>
                </div>
            </div>

            <div class="row">
                <div v-for="(content, index) in data.contents">
                    <div class="portlet box blue"  v-if="content.is_text">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-picture"></i>Content</div>

                            <div class="tools">
                                <a href="javascript:;" @click="removeContent(index)">
                                    <i class="fa fa-remove fa-lg" style="color:#FFFFFF;">X</i>
                                </a>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="form-group" :class="{'has-error' : errors.first('text'+index)}">
                                <div class="row">
                                    <label class="control-label col-md-3 m-t-10">Text
                                        <span style="color: red">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <textarea :name="'text' + index" class="form-control"
                                                  data-vv-as="Text" id="name"
                                                  v-validate="'required'"
                                                  v-model="content.content"
                                                  cols="30" rows="10"></textarea>
                                        <span class="help-block">@{{ errors.first('text'+index) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portlet box blue" v-if="!content.is_text">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-picture"></i>Content</div>

                            <div class="tools">
                                <a href="javascript:;" @click="removeContent(index)">
                                    <i class="fa fa-remove fa-lg" style="color:#FFFFFF;">X</i>
                                </a>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="from-group row p-b-20" >
                                <div class="col-md-12" v-if="!content.is_text">
                                    <label class="control-label" :class="{'has-error' : errors.first('image-'+index)}">
                                        Image
                                        <span style="color: red">*</span>
                                    </label>
                                    <single-image-uploader
                                        ph="200"
                                        pw="300"
                                        default-image="{{ asset('image/noimage.png') }}"
                                        data-vv-as="Image"
                                        :image="content.image ? content.image : (content.media ? content.media.file_url : '{{asset('image/noimage.png')}}')"
                                        v-model="content.image"
                                        :name="'image-' + index"
                                    ></single-image-uploader>
                                    <span class="help-block">@{{ errors.first('image-' + index) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 form-group">
                    <button type="button" class="btn btn-light" style="margin-right: 1%" @click="addContentText()">Add Text</button>
                    <button type="button" class="btn btn-dark" @click="addContentImage()">Add Image</button>
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
