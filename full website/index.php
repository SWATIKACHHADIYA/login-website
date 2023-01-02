<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">details</th>
                    <th scope="col">price</th>
                    <th scope="col">quntitys</th>
                    <th scope="col">total</th>
                    <th><button type="button" id="add" class="btn btn-success">add</button></th>
                </tr>
            </thead>
            <tbody id="tbody">
                <tr class="d-none">
                    <th>1</th>
                    <td><input type="text"></td>
                    <td><input type="number" class="qty"></td>
                    <td><input type="number" class="price"></td>

                    <td><input type="number" class="total"></td>
                    <td><button type="button" class="btn btn-danger remove">delete</button></td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-9">
            </div>
            <div class="col-3">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">total</span>
                    <input type="number" class="form-control" name="grand_total" id="grand_total">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">gst(%)</span>
                    <input type="number" class="form-control" name="gst" id="gst" onchange=" grand_total()">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">gst</span>
                    <input type="number" class="form-control" name="fgst" id="fgst">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">net amt</span>
                    <input type="number" class="form-control" name="fnet" id="fnet">
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add').click(function() {
                var row = `<tr>
                    <th>1</th>
                    <td><input type="text"></td>
                    <td><input type="number" class="price"></td>
                    <td><input type="number" class="qty"></td>
                    <td><input type="number" class="total"></td>
                    <td><button type="button" class="btn btn-danger remove">delete</button></td>
                </tr>`;
                $('#tbody').append(row);
            });
            $("body").on("click", ".remove", function() {
                $(this).closest("tr").remove();
            });
            $("body").on("keyup", ".price", function() {
                var price = Number($(this).val());
                var qty = Number($(this).closest("tr").find(".qut").val());
                $(this).closest("tr").find(".total").val(price*qty);
                grand_total();
            });
            $("body").on("keyup", ".qty", function() {
                var qty = Number($(this).val());
                var price = Number($(this).closest("tr").find(".price").val());
                $(this).closest("tr").find(".total").val(price*qty);
                grand_total();
            });
            // function grand_total(){
            //     var tot = 0;
            //     $(".total").each(function(){
            //       tot += Number($(this).val());
            //     });
            //     $("#grand_total").val(tot);
            // }
            
           
        });
        function grand_total(){
            var sum = 0;
         var amts = document.getElementsByClassName("total");
           for(let i = 0; i < amts.length; i++){
            var amt = amts[i].value;
            sum = +(sum) + +(amt);
           }
           document.getElementById("grand_total").value = sum;
           var gst = document.getElementById("gst").value;
           var fgst = (gst*sum)/100;
           var net = +(sum) + +(fgst);
           document.getElementById("fgst").value = fgst;
           document.getElementById("fnet").value = net;
          
        };

    </script>
</body>


</html>