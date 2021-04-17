@extends("admin.profile.index")

@section("content_profile")
    <div id="password" v-cloak>
        <form action="#" @submit.prevent="submit" class="form-horizontal">
            @csrf
            <div class="row">
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('old_password')}">
                    <label class="control-label">
                        Old Password
                        <span style="color: red">*</span>
                    </label>
                    <input type="password"
                           name="old_password"
                           v-model="data.old_password"
                           data-vv-as="Old Password"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="Old Password">
                    <span class="help-block">@{{ errors.first('old_password') }}</span>
                </div>
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('new_password')}">
                    <label class="control-label">
                        New Password
                        <span style="color: red">*</span>
                    </label>
                    <input type="password"
                           name="new_password"
                           v-model="data.new_password"
                           data-vv-as="New Password"
                           v-validate="'required'"
                           class="form-control"
                           placeholder="New Password"
                           ref="new_password"
                    >
                    <span class="help-block">@{{ errors.first('new_password') }}</span>
                </div>
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('confirm_password')}">
                    <label class="control-label">
                        Confirm Password
                        <span style="color: red">*</span>
                    </label>
                    <input type="password"
                           name="confirm_password"
                           v-model="data.confirm_password"
                           data-vv-as="Confirm Password"
                           v-validate="'required|confirmed:new_password'"
                           class="form-control"
                           placeholder="New Password">
                    <span class="help-block">@{{ errors.first('confirm_password') }}</span>
                </div>
                <div v-if="error">
                    @include('admin.layout.message')
                </div>
            </div>

            <div class="form-actions">
                <div class="btn-set text-right">
                    <button type="submit" class="btn btn-success save-cancel">Save</button>
                    <a href="{{ url('admin/profile/show') }}" class="btn btn-default save-cancel">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection
@section("script")
    <script>
        const data = @json($data);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/profile/password.js') }}"></script>
@endsection
