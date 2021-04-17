@extends("admin.profile.index")

@section("content_profile")
    <div id="editInfo" v-cloak>
        <form action="#" @submit.prevent="submit" class="form-horizontal">
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

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('email')}">
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
                <div v-if="error">
                    @include('admin.layout.message')
                </div>
            </div>
            <div class="text-right">
                <button type="submit" id="submit"
                        class="btn btn-success save-cancel">Save</button>
            </div>
        </form>
    </div>

@endsection

@section("script")
    <script>
        const data = @json($data);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/profile/info.js') }}"></script>
@endsection
