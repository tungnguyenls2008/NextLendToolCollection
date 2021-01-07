<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh sách form đã tổng hợp') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form>
                        <table class="table table-responsive table-auto" style="display: inline-table">
                            <thead>
                            <tr>
                                <th>Chọn</th>
                                <th>Form ID</th>
                                <th>Tên hồ sơ</th>
                                <th>Ngày tạo</th>
                                <th>Phiên bản</th>
                                <th>Người tạo</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            @php
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                            @endphp
                            <tbody>
                            @foreach($forms as $key=>$form)
                                <tr>
                                    <td><input type="checkbox" name="selected_forms" value="{{$form->id}}"></td>
                                    <td>{{$form->id}}</td>
                                    <td>{{$form->form_title}}</td>
                                    <td>{{date('d/m/Y - H:i',strtotime($form->created_at))}}</td>
                                    <td>{{$form->version}}</td>
                                    <td>{{$form->creator}}</td>
                                    <td>
                                        {{--                                    <a href="{{route('new_data',['id'=>$form['id']])}}" class="btn btn-primary">Nhập dữ liệu mới</a>--}}
                                        <a href="{{route('joined_form_edit',['id'=>$form->id])}}" class="btn btn-warning">Chỉnh
                                            sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>
{{--                        <div id="new_form_name_div">--}}
{{--                            <table>--}}
{{--                                <tr>--}}
{{--                                    <td><input id="new_form_name" name="new_form_name" type="text" placeholder="Tên form hồ sơ mới"></td>--}}
{{--                                    <td> <a type="button" class="btn btn-primary" id="join_form">Nối form</a></td>--}}
{{--                                </tr>--}}
{{--                            </table>--}}
{{--                        </div>--}}
                        {{$forms->links()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            $(document).on('click', '#join_form', function (e) {
                var new_form_name=$("#new_form_name").val();

                var selected_form_id = [];
                $('input:checkbox[name=selected_forms]:checked').each(function () {
                    selected_form_id.push($(this).val())
                });
                console.log(selected_form_id)
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{URL::route('join-form')}}",
                    method: 'post',
                    data: {
                        selected_form_id: selected_form_id,
                        new_form_name:new_form_name
                    },
                    success: function (result) {
                        location.reload();
                    }
                })
            });
        });

    </script>
</x-app-layout>
