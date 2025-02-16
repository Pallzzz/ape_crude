<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <H1>Product</H1>

    <div>Index</div>

    <div>
        <a href="{{ route('product.create') }}">Create</a>
    </div>

    <div>
        @if (session()->has('success'))
            <div>
                {{session('success')}}
            </div> 
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td><a href="{{ route('product.edit', ['product' => $product])}}">Edit</a></td>

                    <td>
                        <form action="{{ route('product.delete', ['product' => $product] ) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete"></input> 
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>


</body>
</html>