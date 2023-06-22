<?php

namespace App\Http\Data\Images;

abstract class AbstractImageFile
{
    public string|null $file_name;
    public string|null $url;
    public string|null $expires_at;

    /**
     * @param string|null $file_name
     * @param string|null $url
     * @param string|null $expires_at
     */
    public function __construct(string|null $file_name, string|null $url, string|null $expires_at)
    {
        $this->file_name = $file_name;
        $this->url = $url;
        $this->expires_at = $expires_at;
    }


}
