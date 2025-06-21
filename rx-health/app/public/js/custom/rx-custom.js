/*
Custom javascript code by Rx devs
*/
function showOptions(str) {
    console.log(str);
    if (str == "CASH") {
        document.getElementById('company').style.display = "none";
        document.getElementById('insurance').style.display = "none";
    }
    if (str == "CREDIT") {
        document.getElementById('company').style.display = "block";
        document.getElementById('insurance').style.display = "none";
    }
    else if (str == "INS") {
        document.getElementById('company').style.display = "none";
        document.getElementById('insurance').style.display = "block";
    }
    else if (str == "STAFF") {
        document.getElementById('company').style.display = "none";
        document.getElementById('insurance').style.display = "none";

    }
}

//get selected sms template table data for use in modals 
function get_template_data(index){
    //for the edit sms template modal
    document.getElementById('edit_title').value = document.getElementById('sms_templates_table').rows[index].cells[1].textContent;
    //for the view sms template modal
    document.getElementById('view_title').value = document.getElementById('sms_templates_table').rows[index].cells[1].textContent;
}

//show appointment
function show_appointment(value){
    if (value == "discharged_review") {
        document.getElementById("display_appointment").style.display = "block";
    } else {
        document.getElementById("display_appointment").style.display = "none";
    }
}

//Convert html div content to pdf and download it
function generatePDF(filename) {
    const { jsPDF } = window.jspdf;

    var downloadSection = $('#pdf_div');
    var cWidth = downloadSection.width();
    var cHeight = downloadSection.height();
    var topLeftMargin = 0;
    var pdfWidth = cWidth + topLeftMargin * 2;
    var pdfHeight = pdfWidth * 1.5 + topLeftMargin * 2;
    
    html2canvas(downloadSection[0]).then(canvas => {
       const pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
       pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, cWidth, cHeight);
       pdf.save(filename);
    });
}

//
function shows_doctors_specialty(value){
    if (value == "Yes") {
        document.getElementById("doctor_speciality").style.display = "block";
    } else {
        document.getElementById("doctor_speciality").style.display = "none";
    }
}