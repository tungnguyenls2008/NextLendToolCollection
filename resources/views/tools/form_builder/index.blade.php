<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh sách hồ sơ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-responsive table-auto">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên hồ sơ</th>
                            <th>Phiên bản</th>
                            <th>Người tạo</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($forms as $key=>$form)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$form['form_name']}}</td>
                                <td>{{$form['version']}}</td>
                                <td>{{$form['creator']}}</td>
                                <td><a href="{{route('new_data',['id'=>$form['id']])}}" class="btn btn-primary">Nhập dữ liệu mới</a>
                                    <a href="{{route('form_edit',['id'=>$form['id']])}}" class="btn btn-warning">Chỉnh sửa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
