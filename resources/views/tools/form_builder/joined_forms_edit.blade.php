<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chỉnh sửa hồ sơ: ') }}{{$form['form_title']}}
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
                                <h3>Tiêu đề hồ sơ: {{$form['form_title']}}</h3>
                            </div>
                            <div id="form_builder"></div>
                        </div>
                        <div><input id="form_data" value="{{$form['json_data']}}" hidden>
                            <input id="form_id" value="{{$form['id']}}" hidden>
                            <input id="form_title" value="{{$form['form_title']}}" hidden>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        jQuery(function ($) {
            var edit_data=$("#form_data").val()

            edit_data=JSON.parse(edit_data);
            var options = {
                stickyControls: {
                    enable: true
                },
                i18n: {
                    locale: 'vi-VN'
                },
                disabledAttrs: [
                    'inline',
                    'other',
                    'subtype',
                    'toggle',
                    'access',
                    'className',
                    'description',
                    'placeholder',
                ],
                controlOrder: [
                    'text',
                    'number',
                    'select',
                    'checkbox-group',
                    'radio-group',
                    'file',
                ],
                // typeUserAttrs:{
                //     text: {
                //         point: {
                //             label: 'Điểm', // i18n support by passing and array eg. ['optionCount', {count: 3}]
                //             type: 'select',
                //             options: {
                //                 '1': '1',
                //                 '2': '2',
                //                 '3': '3',
                //                 '4': '4',
                //                 '5': '5',
                //                 '6': '6',
                //                 '7': '7',
                //                 '8': '8',
                //                 '9': '9',
                //                 '10': '10'
                //             },
                //             style: 'border: 1px solid'
                //         }
                //     },
                //     'checkbox-group': {
                //         point: {
                //             label: 'Điểm', // i18n support by passing and array eg. ['optionCount', {count: 3}]
                //             type: 'select',
                //             options: {
                //                 '1': '1',
                //                 '2': '2',
                //                 '3': '3',
                //                 '4': '4',
                //                 '5': '5',
                //                 '6': '6',
                //                 '7': '7',
                //                 '8': '8',
                //                 '9': '9',
                //                 '10': '10'
                //             },
                //             style: 'border: 1px solid'
                //         }
                //     },
                //     date: {
                //         point: {
                //             label: 'Điểm', // i18n support by passing and array eg. ['optionCount', {count: 3}]
                //             type: 'select',
                //             options: {
                //                 '1': '1',
                //                 '2': '2',
                //                 '3': '3',
                //                 '4': '4',
                //                 '5': '5',
                //                 '6': '6',
                //                 '7': '7',
                //                 '8': '8',
                //                 '9': '9',
                //                 '10': '10'
                //             },
                //             style: 'border: 1px solid'
                //         }
                //     },
                //     file: {
                //         point: {
                //             label: 'Điểm', // i18n support by passing and array eg. ['optionCount', {count: 3}]
                //             type: 'select',
                //             options: {
                //                 '1': '1',
                //                 '2': '2',
                //                 '3': '3',
                //                 '4': '4',
                //                 '5': '5',
                //                 '6': '6',
                //                 '7': '7',
                //                 '8': '8',
                //                 '9': '9',
                //                 '10': '10'
                //             },
                //             style: 'border: 1px solid'
                //         }
                //     },
                //     number: {
                //         point: {
                //             label: 'Điểm', // i18n support by passing and array eg. ['optionCount', {count: 3}]
                //             type: 'select',
                //             options: {
                //                 '1': '1',
                //                 '2': '2',
                //                 '3': '3',
                //                 '4': '4',
                //                 '5': '5',
                //                 '6': '6',
                //                 '7': '7',
                //                 '8': '8',
                //                 '9': '9',
                //                 '10': '10'
                //             },
                //             style: 'border: 1px solid'
                //         }
                //     },
                //     radio: {
                //         point: {
                //             label: 'Điểm', // i18n support by passing and array eg. ['optionCount', {count: 3}]
                //             type: 'select',
                //             options: {
                //                 '1': '1',
                //                 '2': '2',
                //                 '3': '3',
                //                 '4': '4',
                //                 '5': '5',
                //                 '6': '6',
                //                 '7': '7',
                //                 '8': '8',
                //                 '9': '9',
                //                 '10': '10'
                //             },
                //             style: 'border: 1px solid'
                //         }
                //     },
                //     select: {
                //         point: {
                //             label: 'Điểm', // i18n support by passing and array eg. ['optionCount', {count: 3}]
                //             type: 'select',
                //             options: {
                //                 '1': '1',
                //                 '2': '2',
                //                 '3': '3',
                //                 '4': '4',
                //                 '5': '5',
                //                 '6': '6',
                //                 '7': '7',
                //                 '8': '8',
                //                 '9': '9',
                //                 '10': '10'
                //             },
                //             style: 'border: 1px solid'
                //         }
                //     },
                //     paragraph: {
                //         point: {
                //             label: 'Điểm', // i18n support by passing and array eg. ['optionCount', {count: 3}]
                //             type: 'select',
                //             options: {
                //                 '1': '1',
                //                 '2': '2',
                //                 '3': '3',
                //                 '4': '4',
                //                 '5': '5',
                //                 '6': '6',
                //                 '7': '7',
                //                 '8': '8',
                //                 '9': '9',
                //                 '10': '10'
                //             },
                //             style: 'border: 1px solid'
                //         }
                //     },
                //     textarea: {
                //         point: {
                //             label: 'Điểm', // i18n support by passing and array eg. ['optionCount', {count: 3}]
                //             type: 'select',
                //             options: {
                //                 '1': '1',
                //                 '2': '2',
                //                 '3': '3',
                //                 '4': '4',
                //                 '5': '5',
                //                 '6': '6',
                //                 '7': '7',
                //                 '8': '8',
                //                 '9': '9',
                //                 '10': '10'
                //             },
                //             style: 'border: 1px solid'
                //         }
                //     },
                //     autocomplete: {
                //         point: {
                //             label: 'Điểm', // i18n support by passing and array eg. ['optionCount', {count: 3}]
                //             type: 'select',
                //             options: {
                //                 '1': '1',
                //                 '2': '2',
                //                 '3': '3',
                //                 '4': '4',
                //                 '5': '5',
                //                 '6': '6',
                //                 '7': '7',
                //                 '8': '8',
                //                 '9': '9',
                //                 '10': '10'
                //             },
                //             style: 'border: 1px solid'
                //         }
                //     },
                //
                // },
                disableFields: ['button','hidden','autocomplete','date','header','paragraph','textarea'],
                defaultFields: edit_data ,
                onSave: function (e) {
                    //do save json to db here
                    var data = form_builder.actions.getData('json')
                    var form_title=$("#form_title").val();
                    var form_id=$("#form_id").val();
                    //alert(data)
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{URL::route('save_edited_joined_form')}}",
                        method: 'post',
                        data: {
                            form_id: form_id,
                            form_title: form_title,
                            json_data: data
                        },
                        success: function (result) {
                            alert('Chỉnh sửa hồ sơ thành công!');

                        }
                    });


                },
            };
            var form_builder = $(document.getElementById('form_builder')).formBuilder(options);
        });
    </script>

</x-app-layout>
