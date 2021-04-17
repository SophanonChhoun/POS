@extends("admin.profile.index")

@section("content_profile")
    <div id="editAvatar" v-cloak>
        <form action="#" @submit.prevent="submit" class="form-horizontal">

            <div class="form-group">
                <label class="control-label">
                    Profile
                    <span style="color: red">*</span>
                </label>
                <single-image-uploader
                    :error="data.error_image"
                    label="Image"
                    ph="300"
                    pw="300"
                    default-image="{{ asset('https://tracker.moodle.org/secure/attachment/30912/f3.png') }}"
                    :image="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('https://tracker.moodle.org/secure/attachment/30912/f3.png')}}')"
                    v-model="data.image"
                    :name="'profile'"
                    v-validate="{required: data.image ? true : false}"
                    data-vv-as="Profile"
                ></single-image-uploader>
            </div>

            <div v-if="error">
                @include('admin.layout.message')
            </div>

            <div class="margiv-top-10 text-right">
                <button type="submit" class="btn btn-success save-cancel">Save</button>
                <a href="/admin/profile/show" class="btn btn-default save-cancel">Cancel</a>
            </div>
        </form>

    </div>
@endsection
@section("script")
    <script>
        const data = @json($data);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/profile/avatar.js') }}"></script>
@endsection
