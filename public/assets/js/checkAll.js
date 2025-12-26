function selectAll(el){
    let rows = document.querySelectorAll('.user')
    if(el.checked){
        rows.forEach((item)=>{
            item.checked = true
        })
    }
    if(!el.checked){
        rows.forEach((item)=>{
            item.checked = false
        })
    }
}
let rows = document.querySelectorAll('.user')
console.log(rows);

let checkAll = document.getElementById('checkAll')
rows.forEach((row)=>{
    row.addEventListener('click', ()=>{
        if (!row.check) {
            checkAll.checked = false
        }
    })
})