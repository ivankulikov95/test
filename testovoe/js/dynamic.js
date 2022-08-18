let url = "anchors.xlsx";
let oReq = new XMLHttpRequest();
oReq.open("GET", url, true);
oReq.responseType = "arraybuffer";

oReq.onload = function(e) {
    let arraybuffer = oReq.response;

    /* convert data to binary string */
    let data = new Uint8Array(arraybuffer);
    let arr = new Array();
    for(let i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
    let bstr = arr.join("");

    /* Call XLSX */
    let workbook = XLSX.read(bstr, {type:"binary"});

    /* DO SOMETHING WITH workbook HERE */
    let first_sheet_name = workbook.SheetNames[0];
    /* Get worksheet */
    let worksheet = workbook.Sheets[first_sheet_name];

    // Вывода номера------------------------------------------------
    let file = XLSX.utils.sheet_to_json(worksheet,{raw:true});

    let tel = document.querySelectorAll(".dynamic-phone");
    let prefiks_number = "+7";
    let prefiks_link = "tel:+7";

    for(let i = 0; i < file.length; i++) {
        if (file[i].domain == document.location.host) {
            for(let j = 0; j < tel.length; j++) {
                tel[j].innerHTML = prefiks_number + file[i].tel;
                tel[j].href = prefiks_link + file[i].link;
            }
            break;
        }
    }
    
}

oReq.send();