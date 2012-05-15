<?php

class audiorecorder {

        /**
         * This method saves the files to a dir named 'wavfiles' within
         * the same plugin dir.
         *
         * Calls exit();
         */
        public function save($uploadedfile) {
            // create a 'wavfiles' dir
            $dir = $this->create_dir("wavfiles");
            // generate filename relative to the plugin dir
            $filename = $this->generate_filename($dir);
            // Move the file to the voice directory
            if (file_exists($filename) ||
                !move_uploaded_file($uploadedfile, $filename)) {
                print "The file couldn't be saved! Please try again";
                exit;
            }

            // Successfully uploaded the file
            print "The file has been saved!";
            exit;
        }

        /**
         * Create a directory to store the .wav files
         * Mode : 700
         */
        private function create_dir($dir) {
            if (!is_dir($dir)) {
                mkdir($dir, 0700);
            }
            return $dir;
        }

        /**
         * Generate a filename using the time value
         *
         * @return string of the generated filenaame
         */
        private function generate_filename($dir) {
            $i = 0;
            do {
                if ($i > 0) sleep(1);
                $filename = $dir . '/' . time() . '.wav';
                $i++;
            } while ($i < 3 && file_exists($filename)); // try 3 times for unique filename

            return $filename;
        }

}
