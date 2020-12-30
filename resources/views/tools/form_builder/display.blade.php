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
                    <input value="{{$form['json_data']}}" id="json_data" hidden>
                <div id="form_render"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(function($) {
            var container = $('#form_render');
            var formData = $('#json_data').val();

            var options = {
                container: container,
                formData: formData,
                i18n: {
                    locale: 'vi-VN'
                },
                dataType: 'json'
            };

            container.formRender(options);
        });
    </script>
</x-app-layout>
