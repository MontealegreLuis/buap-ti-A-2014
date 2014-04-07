<?php
namespace Framework\View;

class View
{
    /** @type string */
    protected $scriptsFolder;

    /** @type array */
    protected $values;

    /** @type string */
    protected $layout;

    /**
     * @param string $scriptsFolder
     * @param string $layout
     */
    public function __construct($scriptsFolder, $layout)
    {
        $this->scriptsFolder = $scriptsFolder;
        $this->layout = $layout;
    }

    /**
     * @param array $values
     */
    public function assign(array $values)
    {
        $this->values = $values;
    }

    /**
     * @param  unknown $script
     * @return string
     */
    public function render($script)
    {
        ob_start();
        require "{$this->scriptsFolder}/$script";
        $content = ob_get_clean();

        $this->values['content'] = $content;

        ob_start();
        require $this->layout;

        return ob_get_clean();
    }

    /**
     * @param string $script
     */
    public function includeScript($script)
    {
        require $script;
    }

    /**
     * @param  string $property
     * @return string
     */
    public function __get($property)
    {
        return !empty($this->values[$property])
               ? $this->values[$property]
               : '';
    }
}
