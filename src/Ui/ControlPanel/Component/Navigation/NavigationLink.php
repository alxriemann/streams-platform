<?php

namespace Anomaly\Streams\Platform\Ui\ControlPanel\Component\Navigation;

use Anomaly\Streams\Platform\Asset\Asset;
use Anomaly\Streams\Platform\Image\Image;
use Anomaly\Streams\Platform\Ui\Icon\Icon;
use Anomaly\Streams\Platform\Ui\Traits\HasIcon;
use Anomaly\Streams\Platform\Ui\Icon\IconRegistry;
use Anomaly\Streams\Platform\Ui\Icon\Command\GetIcon;
use Anomaly\Streams\Platform\Ui\Contract\IconInterface;
use Anomaly\Streams\Platform\Ui\Traits\HasClassAttribute;
use Anomaly\Streams\Platform\Ui\Traits\HasHtmlAttributes;
use Anomaly\Streams\Platform\Ui\Contract\ClassAttributeInterface;
use Anomaly\Streams\Platform\Ui\Contract\HtmlAttributesInterface;
use Anomaly\Streams\Platform\Ui\ControlPanel\Component\Navigation\Contract\NavigationLinkInterface;

/**
 * Class NavigationLink
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class NavigationLink implements NavigationLinkInterface, IconInterface, ClassAttributeInterface, HtmlAttributesInterface
{

    use HasIcon;
    use HasClassAttribute;
    use HasHtmlAttributes;

    /**
     * The links slug.
     *
     * @var null|string
     */
    protected $slug = null;

    /**
     * The links title.
     *
     * @var null|string
     */
    protected $title = null;

    /**
     * The active flag.
     *
     * @var bool
     */
    protected $active = false;

    /**
     * The favorite flag.
     *
     * @var bool
     */
    protected $favorite = false;

    /**
     * The links permission.
     *
     * @var null|string
     */
    protected $permission = null;

    /**
     * The links breadcrumb.
     *
     * @var null|string
     */
    protected $breadcrumb = null;

    /**
     * Get the slug.
     *
     * @return null|string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the slug.
     *
     * @param $slug
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get the active flag.
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Set the active flag.
     *
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the favorite flag.
     *
     * @return boolean
     */
    public function isFavorite()
    {
        return $this->favorite;
    }

    /**
     * Set the favorite flag.
     *
     * @param boolean $favorite
     */
    public function setFavorite($favorite)
    {
        $this->favorite = $favorite;

        return $this;
    }

    /**
     * Get the permission.
     *
     * @return null|string
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * Set the permission.
     *
     * @param $permission
     * @return $this
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;

        return $this;
    }

    /**
     * Get the breadcrumb.
     *
     * @return null|string
     */
    public function getBreadcrumb()
    {
        return $this->breadcrumb;
    }

    /**
     * Set the breadcrumb.
     *
     * @param $breadcrumb
     * @return $this
     */
    public function setBreadcrumb($breadcrumb)
    {
        $this->breadcrumb = $breadcrumb;

        return $this;
    }

    /**
     * Get the HREF attribute.
     *
     * @param  null $path
     * @return string
     */
    public function getHref($path = null)
    {
        return array_get($this->attributes, 'href') . ($path ? '/' . $path : $path);
    }

    /**
     * Return merged attributes.
     *
     * @param array $attributes
     */
    public function attributes(array $attributes = [])
    {
        return array_merge($this->attributes, [
            'active' => json_encode($this->isActive()),
            'title' => $this->getTitle(),
        ], $attributes);
    }
}
