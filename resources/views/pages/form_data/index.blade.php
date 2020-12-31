<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh sách dữ liệu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-responsive table-auto" style="display: inline-table">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã hồ sơ</th>
                            <th>Người tạo</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$case)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$case['data_pack']}}</td>
                                <td>{{$case['creator']}}</td>
                                <td><a href="" class="btn btn-primary">Chi tiết</a>
                                    <a href="" class="btn btn-warning">Chỉnh sửa</a>
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
