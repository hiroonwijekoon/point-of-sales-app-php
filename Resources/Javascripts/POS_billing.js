let table_cart = document.getElementById("cart_table");
let add_button = document.getElementById("add_button");
let delete_button = document.getElementById("delete_button");
let print_button = document.getElementById("printButton");
let print_button_link = document.getElementById("print_button_link");
let payment_button = document.getElementById("payment_button");

let total_items = document.querySelector("#total_items");
let grand_total = document.querySelector("#grand_total");
let discount = document.querySelector("#discount");
let total_payable = document.querySelector("#total_payable");
let cash_recieved = document.querySelector("#modal_cash_recieved");

let item = document.querySelector("#inventory");
let unitPrice = document.querySelector("#unit_price");
let qty = document.querySelector("#qty");

let unitPriceValue = 0;

let cart_items_array = {};
let cart_items_array_index=0;

var getInvoiceID="0";

//disable Print Bill Button OnLoad
print_button.disabled=true;




//convert string to money format ************
function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
    try {
      decimalCount = Math.abs(decimalCount);
      decimalCount = isNaN(decimalCount) ? 2 : decimalCount;
  
      const negativeSign = amount < 0 ? "-" : "";
  
      let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
      let j = (i.length > 3) ? i.length % 3 : 0;
  
      return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
    } catch (e) {
      console.log(e)
    }
  };
//******************************


//add new data to table
add_button.addEventListener('click',()=> {
    if(!isNaN(unitPrice.value) && !isNaN(qty.value))
    {
        let subtotal_real = parseFloat(unitPriceValue) * parseFloat(qty.value);
        let subtotal = parseFloat(unitPrice.value) * parseFloat(qty.value);
        let discountValue=0;
        if(unitPrice.value<unitPriceValue)
        {
            discountValue=(parseFloat(unitPriceValue)-parseFloat(unitPrice.value)) * parseFloat(qty.value);
        }
        else
        {
            discountValue = 0;
        }
        let template = `
        <tr>
            <td>${item.options[item.selectedIndex].innerHTML}</td>
            <td>${formatMoney(unitPrice.value)}</td>
            <td>${qty.value}</td>
            <td>${formatMoney(subtotal)}</td>
        </tr>
        `;
        table_cart.innerHTML += template;
        total_items.innerHTML = parseFloat(total_items.innerHTML)+1;
        grand_total.innerHTML = formatMoney(parseFloat(grand_total.innerHTML.replace(/[^0-9\.-]+/g,""))+ parseFloat(subtotal_real));
        discount.innerHTML = formatMoney(parseFloat(discount.innerHTML.replace(/[^0-9\.-]+/g,""))+parseFloat(discountValue));
        total_payable.innerHTML = formatMoney(parseFloat(grand_total.innerHTML.replace(/[^0-9\.-]+/g,"")) - parseFloat(discount.innerHTML.replace(/[^0-9\.-]+/g,"")));
        cart_items_array[cart_items_array_index]=item.options[item.selectedIndex].innerHTML+"#"+item.value+":"+unitPrice.value+":"+qty.value+":"+subtotal;
        console.log(cart_items_array[cart_items_array_index]);
        cart_items_array_index++;
    }
    selectRow();

});

// select table rows on click
var selectedRowIndex;
var tbRowsLength;
let cartTable = document.getElementById("cart_table");
var tempSubTotal;
function selectRow()
{
    var tbRowsLength = cartTable.rows.length;
    for(var i=1;i < tbRowsLength; i++)
    {
        cartTable.rows[i].onclick = function(){
            if(typeof selectedRowIndex !== "undefined")
            {
                cartTable.rows[selectedRowIndex].classList.toggle("selected");
            }
            selectedRowIndex = this.rowIndex;
            this.classList.toggle("selected");
            tempSubTotal = this.cells[3].innerHTML.replace(/[^0-9\.-]+/g,"");
        };
    }
}
selectRow();

//delete selected row
 delete_button.addEventListener('click', () => {
     cartTable.deleteRow(selectedRowIndex);

     total_items.innerHTML = parseFloat(total_items.innerHTML)-1;
     grand_total.innerHTML = formatMoney(parseFloat(grand_total.innerHTML.replace(/[^0-9\.-]+/g,""))- parseFloat(tempSubTotal));
     total_payable.innerHTML = formatMoney(parseFloat(grand_total.innerHTML.replace(/[^0-9\.-]+/g,"")) - parseFloat(discount.innerHTML));
 }); 


 //load selected item data to input fields
function load_data_to_fields()
{
    var itemID = document.getElementById("inventory").value.toString();
    var ajax = new XMLHttpRequest();
    var method ="GET";
    var url ="../PHP/selected_inventory.php?id="+itemID;
    var asynchronous = true;

    ajax.open(method,url,asynchronous);
    ajax.send();
    
    ajax.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            document.getElementById("unit_price").value= this.response.replace(/['"]+/g, '');
            unitPriceValue = this.response.replace(/['"]+/g, '');
        }
    }
}

//Clear fields after 'Add' button click
add_button.addEventListener('click',function(){
    unitPrice.value=null;
    qty.value=null;
    item.selectedIndex = 0;
});

//payment button event handler
document.getElementById("payment_button").addEventListener('click',function () {
    document.getElementById("modal_total_payable").value = total_payable.innerHTML;
});

//save and print
document.getElementById("saveAndPrint").addEventListener('click',function () {
    var getCusID = document.getElementById("customers").value.toString();
    //var tempArray = getCusID.split("#");

    console.log("total="+grand_total.innerHTML.replace(/[^0-9\.-]+/g,""));


    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../PHP/create_invoice.php?cus_id="+getCusID+"&total="+grand_total.innerHTML.replace(/[^0-9\.-]+/g,"").toString()+"&discount="+discount.innerHTML.replace(/[^0-9\.-]+/g,"")+"&total_payable="+total_payable.innerHTML.replace(/[^0-9\.-]+/g,"")+"&cash_recieved="+cash_recieved.value.toString();
    var asynchronous = true;

    ajax.open(method,url,asynchronous);
    ajax.send();

    ajax.onreadystatechange = function ()
    {
        if(this.readyState == 4 && this.status == 200)
        {
                //retrieving Invoice ID
                getInvoiceID = this.response.toString();
                console.log(getInvoiceID);
                var jsonString = JSON.stringify(cart_items_array);

                //save invoice attributes
                $.ajax({
                    type: "POST",
                    url: "../PHP/create_invoice_attributes.php?lastId="+getInvoiceID,
                    data: { cartArray: jsonString },
                    success: function(data) {
                         console.log(data);
                    }
                 });
        }
    }

    print_button.disabled=false;
    payment_button.disabled=true;
     
    //show success msg
    document.getElementById("alert_success").style.display="block";
});


function php_serialize(obj)
{
    var string = '';

    if (typeof(obj) == 'object') {
        if (obj instanceof Array) {
            string = 'a:';
            tmpstring = '';
            count = 0;
            for (var key in obj) {
                tmpstring += php_serialize(key);
                tmpstring += php_serialize(obj[key]);
                count++;
            }
            string += count + ':{';
            string += tmpstring;
            string += '}';
        } else if (obj instanceof Object) {
            classname = obj.toString();

            if (classname == '[object Object]') {
                classname = 'StdClass';
            }

            string = 'O:' + classname.length + ':"' + classname + '":';
            tmpstring = '';
            count = 0;
            for (var key in obj) {
                tmpstring += php_serialize(key);
                if (obj[key]) {
                    tmpstring += php_serialize(obj[key]);
                } else {
                    tmpstring += php_serialize('');
                }
                count++;
            }
            string += count + ':{' + tmpstring + '}';
        }
    } else {
        switch (typeof(obj)) {
            case 'number':
                if (obj - Math.floor(obj) != 0) {
                    string += 'd:' + obj + ';';
                } else {
                    string += 'i:' + obj + ';';
                }
                break;
            case 'string':
                string += 's:' + obj.length + ':"' + obj + '";';
                break;
            case 'boolean':
                if (obj) {
                    string += 'b:1;';
                } else {
                    string += 'b:0;';
                }
                break;
        }
    }
    return string;
}

//format cash recieved as money
document.getElementById("modal_cash_recieved").addEventListener("keyup",formatCashRecieved);

function formatCashRecieved()
{
    
}

