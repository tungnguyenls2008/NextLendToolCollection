<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dữ liệu đã nhập') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>{{$data[0]['data_pack']}} - need more specific data</h3>
                    <input value="{{$data[0]['data']}}" id="json_data" hidden>
                    <form id="input_data_form" name="input_data_form">
                        <div id="form_render"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

        jQuery(function ($) {
            var container = $('#form_render');
            var formData = $('#json_data').val();

            var options = {
                container: container,
                formData: formData,
                dataType: 'json'
            };

            container.formRender(options);
        });
        $(document).ready(function(){
            $("#input_data_form :input").prop("disabled", true);
        });
        {{--$(document).ready(function() {--}}

        {{--    $(document).on('click', '#submit', function (e) {--}}
        {{--        var input_data=$("#input_data_form").serializeArray();--}}
        {{--        var data_pack=$("#data_pack").val();--}}

        {{--        console.log(data_pack)--}}
        {{--        e.preventDefault();--}}
        {{--        $.ajaxSetup({--}}
        {{--            headers: {--}}
        {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--            }--}}
        {{--        });--}}
        {{--        jQuery.ajax({--}}
        {{--            url: "{{URL::route('save_data')}}",--}}
        {{--            method: 'post',--}}
        {{--            data: {--}}
        {{--                data_pack: data_pack,--}}
        {{--                input_data: input_data--}}
        {{--            },--}}
        {{--            success: function (result) {--}}
        {{--                console.log('Lưu hồ sơ thành công!');--}}

        {{--            }--}}
        {{--        })--}}
        {{--    });--}}
        {{--});--}}
    </script>
</x-app-layout>
