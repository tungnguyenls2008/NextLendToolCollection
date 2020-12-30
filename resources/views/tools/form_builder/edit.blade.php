<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chỉnh sửa hồ sơ: ') }}{{$form['form_name']}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header bg-primary text-light">
                            <div class="row">
                                <h3 class="col-9">Chỉnh sửa hồ sơ</h3>
                                <a href="{{ route('forms') }}" class="col-3 btn btn-primary">Quay lại</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="form_name">Tên loại hồ sơ: </label><input type="text" id="form_name" required value="{{$form['form_name']}}">
                            </div>
                            <div id="form_builder"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        jQuery(function ($) {
            var options = {
                i18n: {
                    locale: 'vi-VN'
                },
                defaultFields: [{
                    //todo: edit this field to take stored form data as value to edit, you're getting there
                    className: "form-control",
                    label: "Tiêu đề hồ sơ",
                    placeholder: "Xin nhập tiêu đề hồ sơ",
                    name: "form_name",
                    required: true,
                    type: "text",
                    id: "form_name"
                },

                ],
                onSave: function (e) {
                    //do save json to db here
                    var data = form_builder.actions.getData('json')
                    var form_name=$('#form_name').val();
                    //alert(data)
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{URL::route('save_form')}}",
                        method: 'post',
                        data: {
                            form_name: form_name,
                            json_data: data
                        },
                        success: function (result) {
                            alert('Lưu hồ sơ thành công!');

                        }
                    });


                },
            };
            var form_builder = $(document.getElementById('form_builder')).formBuilder(options);
        });
    </script>

</x-app-layout>
