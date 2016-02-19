<?php


class LoadashPhp
{
    public function LoadashPhp() {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
    }

    /**
     * Creates an array of elements split into groups the length of size.
     * If array can’t be split evenly, the final chunk will be the remaining elements.
     * @param $array
     * @param $number
     * @throws Exception
     * @return array
     */
    public function chunk($array, $number) {
        if(!is_array($array) || !is_int($number)) {
            $this->throw_exception("Invalid param type");
        }
        if(count($array) < $number) {
            $this->throw_exception("Array size is smaller than number");
        }
        $index = 0;
        $array_index = 0;
        $chunk_array = array();
        foreach($array as $value) {
            if($index == $number) {
                $index = 0;
                $array_index++;
            }
            $chunk_array[$array_index][] = $value;
            $index++;
        }
        return $chunk_array;
    }

    /**
     * Creates an array with all falsey values removed.
     * The values false, null, 0, and "" are falsey.
     * @param $array
     * @throws Exception
     * @return array
     */
    public function compact($array) {
        if(!is_array($array)) {
            $this->throw_exception("Invalid param type");
        }
        if(empty($array)) {
            $this->throw_exception("Array is empty");
        }
        $chunk_array = array();
        foreach($array as $value) {
            if($value !== false && $value != null && !empty($value))
                $chunk_array[] = $value;
        }
        return $chunk_array;
    }

    /**
     * Throws an exception with provided message.
     * @param $msg
     * @throws Exception
     */
    private function throw_exception($msg) {
        throw new Exception($msg);
    }
}
