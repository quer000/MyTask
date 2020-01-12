//vykdomas failo pasirinkimas, kuri faila norima atidaryti
function selectFile(file)
{
  var thisLi = document.getElementById(file);
  var allLi = document.getElementsByClassName("allFiles");
  document.getElementById("file").value = file;
  
  for (x = 0; x < allLi.length; x++) {
      allLi[x].classList.add('myLi');
      allLi[x].classList.remove('myLiSelected');
  }

  if (thisLi.className.split(" ")[0] == "myLi" || thisLi.className.split(" ")[1] == "myLi") {
    thisLi.classList.add('myLiSelected');
    thisLi.classList.remove('myLi');
  }
}

//failu saraso filtravimas
function filterFiles()
{
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName("li");

  for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("a")[0];
      txtValue = a.textContent || a.innerText;

      if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
      } else {
          li[i].style.display = "none";
      }
  }
}

//failu turinio filtravimas
function filterContent()
{
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td0 = tr[i].getElementsByTagName("td")[0];
    td1 = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[2];
    
    if (td0) {
      
      txtValue = td0.textContent+td1.textContent+td2.textContent || td0.innerText+td1.innerText+td2.innerText;

      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}