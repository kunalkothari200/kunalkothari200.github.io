const generatePDF = async ( name ) => {
    const {PDFDocument, rgb} = PDFLib;

    const exBytes = await fetch("vijayvargiya.pdf").then((res) => {
        return res.arrayBuffer()
    });

    const exFont = await fetch("Sanchez-Italic.ttf").then((res) => {
        return res.arrayBuffer()
    });
    
    const pdfDoc = await PDFDocument.load(exBytes);

    //pdfDoc.registerFontkit(fontKit);

    //const myFont = await pdfDoc.embedFont(exFont);

    const pages = pdfDoc.getPages();
    const firstPg = pages[0];

    firstPg.drawText(name,{
        x:260,
        y:210,
        size:38,
    })

    const uri = await pdfDoc.saveAsBase64({dataUri:true});
    saveAs(uri, "Certificate-By-Udaipur-Trendz.pdf", { autoBom: true});
   //window.open(uri);
    
    document.querySelector('#mypdf').src = uri;
};

const submitBtn = document.getElementById("submit");

submitBtn.addEventListener("click", ()=>{
    var name = prompt('What is your Full Name ?');
    if(name == ""){
        alert("please Enter Your Name.");
    }
    else{
        generatePDF(name);
    }
});
