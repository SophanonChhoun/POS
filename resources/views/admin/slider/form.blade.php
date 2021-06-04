<div v-for="(banner, index) in data">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Slider</div>

            <div class="tools">
                <a href="javascript:;" @click="removeBanner(index)">
                    <i class="fa fa-remove fa-lg" style="color:#FFFFFF;">X</i>
                </a>
            </div>
        </div>

        <div class="portlet-body">
            <div class="form-group" :class="{'has-error' : errors.first('name'+index)}">
                <div class="row">
                    <label class="control-label col-md-3 m-t-10">Name
                        <span style="color: red">*</span>
                    </label>
                    <div class="col-md-7">
                        <input type="text" step="any" class="form-control" placeholder="Name"
                               data-vv-as="Name" id="name"
                               :name="'name' + index"
                               v-validate="'required'"
                               v-model="banner.name">
                        <span class="help-block">@{{ errors.first('name'+index) }}</span>
                    </div>
                </div>
            </div>
            <div class="form-group" v-if="!banner.news_promotion && !banner.is_category">
                <div class="row">
                    <label class="control-label col-md-3 m-t-10">URL
                    </label>
                    <div class="col-md-7">
                        <input type="text" step="any" class="form-control" placeholder="URL"
                               id="url"
                               :name="'url' + index"
                               v-validate="'required'"
                               v-model="banner.url">
                    </div>
                </div>
            </div>
            <div class="form-group" :class="{'has-error' : errors.first('category_id'+index)}">
                <div class="row" >
                    <div class="control-label col-md-3 m-t-10">
                        <label>
                            <input type="checkbox"
                                   v-model="banner.news_promotion"
                                   :name="'news_promotion'+index"
                                   data-vv-as="News & Promotion"
                                   @click="updateNews(index)" >
                            <span></span>
                        </label>
                        <label class="control-label">News & Promotion
                            <span style="color: red" v-if="!banner.is_category">*</span>
                        </label>
                    </div>

                    <div class="control-label col-md-3 m-t-10">
                        <label>
                            <input type="checkbox" v-model="banner.is_category">
                            <span></span>
                        </label>
                        <label class="control-label">Category
                            <span style="color: red" v-if="banner.is_category">*</span>
                        </label>
                    </div>

                    <div class="col-md-7">

                        <span v-for="category in categories" v-if="banner.is_category">
                            <label class="mt-checkbox" style="margin-right: 40px; margin-top: 10px">
                                <input type="radio" v-model="banner.category_id" :value="category.id"> @{{ category.name }}
                                <span></span>
                            </label>
                        </span>

                        <span class="help-block">@{{ errors.first('category_id'+index) }} </span>
                    </div>
                </div>
            </div>

            <div class="from-group row p-b-20" >
                <div class="col-md-12">
                    <label class="control-label" :class="{'has-error' : errors.first('image-'+index)}">
                        Image
                        <span style="color: red">*</span>
                    </label>
                    <single-image-uploader
                        ph="200"
                        pw="300"
                        default-image="{{ asset('image/noimage.png') }}"
                        data-vv-as="Image"
                        :image="banner.image ? banner.image : (banner.media ? banner.media.file_url : '{{asset('image/noimage.png')}}')"
                        v-model="banner.image"
                        :name="'image-' + index"
                    ></single-image-uploader>
                    <span class="help-block">@{{ errors.first('image-' + index) }}</span>
                </div>
            </div>

        </div>
    </div>
</div>
