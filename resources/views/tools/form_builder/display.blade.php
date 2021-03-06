<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nhập dữ liệu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>{{$form['form_title']}}</h3>
                    <a>@if(isset($success)){{$success}}@endif</a>
                    <form id="input_data_form" name="input_data_form" enctype="multipart/form-data" method="post"
                          action="{{URL::route('save_data')}}">
                        @csrf
                        <div id="form_render"></div>
                        <input value="{{$form['json_data']}}" id="json_data" name="json_data" hidden>
                        <input value="" id="user_data" name="user_data" hidden>
                        <input value="{{$form['id']}}" id="form_id" name="form_id" hidden>
                        <input value="{{substr(md5(rand()), 0, 9)}}" id="data_pack" name="data_pack" hidden>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Lưu dữ liệu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

        $(document).ready(function () {
            var container = $('#form_render');
            var formData = $('#json_data').val();

            var options = {
                container: container,
                formData: formData,
                dataType: 'json'
            };
            var formRenderInstance = container.formRender(options);
            $(document).click(function () {
                var input_data = formRenderInstance.userData;
                input_data=JSON.stringify(input_data);
                $("#user_data").val(input_data);
            });
            //done: the submit button should not trigger ajax call, do regular form submit instead.
            {{--$(document).on('click', '#submit', function (e) {--}}
            {{--    var input_data=formRenderInstance.userData;--}}
            {{--    var data_pack=$("#data_pack").val();--}}
            {{--    var form_id = $('#form_id').val();--}}

            {{--    e.preventDefault();--}}
            {{--    $.ajaxSetup({--}}
            {{--        headers: {--}}
            {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--        }--}}
            {{--    });--}}
            {{--    jQuery.ajax({--}}
            {{--        url: "{{URL::route('save_data')}}",--}}
            {{--        method: 'post',--}}
            {{--        enctype: 'multipart/form-data',--}}
            {{--        data: {--}}
            {{--            form_id: form_id,--}}
            {{--            data_pack: data_pack,--}}
            {{--            input_data: input_data,--}}
            {{--        },--}}
            {{--        success: function (result) {--}}
            {{--            console.log('Lưu hồ sơ thành công!');--}}

            {{--        }--}}
            {{--    })--}}
            {{--});--}}
        });
    </script>
</x-app-layout>
