<script>
    window.addEventListener('pageshow', function (event) {
        if (!(event.persisted || window.performance && window.performance.navigation.type == 2))
        {
            @if (Session::has('success'))
            $.toast({
                heading: 'Success',
                text: '{!! Session::get('success') !!}',
                showHideTransition: 'slide',
                icon: 'success'
            });
            @php Session::forget('success'); @endphp
            localStorage.setItem('action', '');
            @endif
            @if (Session::has('error'))
            @php
                $message = $error = Session::get('error');
                if(!is_string($error)){
                    $message = '';
                    foreach ($error as $value){
                        if(!is_string($value)){
                            foreach ($value as $moreValue){
                                $message .= $moreValue . '\n';
                            }
                        } else {
                            $message .= $value . '\n';
                        }
                    }
                }
            @endphp
            $.alert({
                title: 'Message!',
                content: '{{ $message }}',
                type: 'orange',
                typeAnimated: true,
                escapeKey: 'close',
                buttons: {
                    close: function () {
                    }
                }
            });
            @php Session::forget('error'); @endphp
            @endif
        }
    },false);
</script>
