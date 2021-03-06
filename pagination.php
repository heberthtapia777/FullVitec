<?php
	
	function paginate($reload, $page, $tpages, $adjacents) {
		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination justify-content-center">';
		
		// previous label
		
		if($page==1) {
			$out.= "<li class='page-item disabled'><span><a class='page-link' href='#' tabindex='-1' aria-disabled='true'>$prevlabel</a></span></li>";
		} else if($page==2) {
			$out.= "<li class='page-item'><span><a class='page-link' href='javascript:void(0);' onclick='loadPagination(1)'>$prevlabel</a></span></li>";
		}else {
			$out.= "<li class='page-item'><span><a class='page-link' href='javascript:void(0);' onclick='loadPagination(".($page-1).")'>$prevlabel</a></span></li>";
			
		}
		
		// first label
		if($page>($adjacents+1)) {
			$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadPagination(1)'>1</a></li>";
		}
		// interval
		if($page>($adjacents+2)) {
			$out.= "<li class='page-item'><a class='page-link'>...</a></li>";
		}
		
		// pages
		
		$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
		$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
		for($i=$pmin; $i<=$pmax; $i++) {
			if($i==$page) {
				$out.= "<li class='page-item active' aria-current='page'><a class='page-link' href='#'>$i <span class='sr-only'>(current)</span></a></li>";
			}else if($i==1) {
				$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadPagination(1)'>$i</a></li>";
			}else {
				$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadPagination(".$i.")'>$i</a></li>";
			}
		}
		
		// interval
		
		if($page<($tpages-$adjacents-1)) {
			$out.= "<li class='page-item'><a class='page-link'>...</a></li>";
		}
		
		// last
		
		if($page<($tpages-$adjacents)) {
			$out.= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadPagination($tpages)'>$tpages</a></li>";
		}
		
		// next
		
		if($page<$tpages) {
			$out.= "<li class='page-item'><span><a class='page-link' href='javascript:void(0);' onclick='loadPagination(".($page+1).")'>$nextlabel</a></span></li>";
		}else {
			$out.= "<li class='page-item disabled'><span><a class='page-link'>$nextlabel</a></span></li>";
		}
		
		$out.= "</ul>";
		return $out;
	}
?>