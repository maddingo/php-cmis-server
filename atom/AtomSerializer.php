<?php
class AtomSerializer {
	public function serialize($result) {
		ob_start();
		phpinfo();
		
		return ob_get_flush();
	}
}