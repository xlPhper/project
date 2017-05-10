<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>
</head>
<body>

<select id="optionSelect">
    <option disabled="disabled" selected="selected">请选择xx</option>
</select>


<script type="text/javascript">

    $.ajax({
        'url':'cate',
        'type':'get',
        async:false,
        data: null,
        success:function(data){
            if (data) {
//                eval('var result = ' + data);
                var $select   = $('#optionSelect'),
                        optionStr = '',
                        dataCount = data.category.length;

                for(var i = 0; i < dataCount; i++){
                    var tmpItem = data.category[i];

                    optionStr += '<option value="'+ tmpItem.id + '">' +
                            tmpItem.name +
                            '</option>';
                }

                $select.append(optionStr);
            }
            else {
                alert(456)
            }
        }
    })

</script>

<script type="text/javascript">
    $('#optionSelect').on('change',function(){
        var select=$(this).val();

        alert(select)
    })
</script>


<!--<script type="text/javascript">-->
<!--console.info($);-->
<!--var data = [-->
<!--{-->
<!--name : 'option1',-->
<!--value: 'val1'-->
<!--},-->
<!--{-->
<!--name : 'option2',-->
<!--value: 'val2'-->
<!--},-->
<!--{-->
<!--name : 'option3',-->
<!--value: 'val3'-->
<!--}-->
<!--];-->

<!--setTimeout(function() {-->
<!--var $optionSelect = $('#optionSelect'),-->
<!--optionsStr    = '',-->
<!--dataCount     = data.length;-->

<!--for (var i = 0; i < dataCount; i ++) {-->
<!--var tmpItem = data[i];-->

<!--optionsStr += '<option value="' + tmpItem.value + '">' +-->
<!--tmpItem.name +-->
<!--'</option>';-->
<!--}-->

<!--$optionSelect.append(optionsStr);-->
<!--}, 3000)-->
<!--</script>-->
</body>
</html>