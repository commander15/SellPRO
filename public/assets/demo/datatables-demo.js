function initTable(id) {
  const datatablesSimple = document.getElementById(id);
  if (datatablesSimple) {
      new simpleDatatables.DataTable(datatablesSimple);
  }
}
