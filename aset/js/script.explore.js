function cari(keyword) {
	pos("../campaigns/cari", "q="+keyword, (res) => {
		$("#load").tulis(res)
	})
	history.replaceState("s", "pageExplore", "../explore/"+encodeURIComponent(keyword))
}

cari(" ")