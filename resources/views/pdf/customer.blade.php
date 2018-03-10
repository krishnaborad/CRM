<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Convert to PDF</title>
        <style media="screen">
            table{
                width: 80%;
                margin: 0 auto;
                border:1px solid;
            }
        </style>
    </head>
    <body>
        <table>
            <caption><h1>Products Information</h1></caption>
                <thead>

                    <th>id</th>
                    <th>Name</th>
                    <th>Prise</th>
                    <th>Product_code</th>
                    <th>Description</th>
                    <th>New arrivals</th>
                    <th>Category</th>
                    <th>Company</th>
                </thead>
                <tbody>
                    @foreach($products as  $product)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                    
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->prise }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ ( $product->new_arrivals == 0 )? "no" : "yes" }}</td>
                        <td>{{(isset( $product->category->name ))? $product->category->name : ""}}</td>
                        <td>{{(isset( $product->company->name ))? $product->company->name : ""}}</td>
                    </tr>
                    @endforeach
                </tbody>

        </table>
    </body>
</html>
