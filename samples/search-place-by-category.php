<?php
class Coordinates
{
    protected $latitude;
    protected $longitude;
}
class Address {}
class Category
{
    protected $id;
    protected $description;
}
class PlacesTable
{
    /**
     * @param  Coordinates         $currentLocation
     * @param  Category            $category
     * @return RecreationalPlace[]
     */
    public function findNearestPlacesOfCategory(Coordinates $currentLocation, Category $category){}
}
class RecreationalPlace
{
    /** @type Coordinates */
    protected $location;
    protected $name;
    /** @type Address */
    protected $addres;
    /** @type Category */
    protected $category;
}
class SearchPlaceByCategory
{
    /**
     * @param  Category            $category
     * @param  Coordinates         $currentLocation
     * @return RecreationalPlace[]
     */
    public function searchByCategory(Category $category, Coordinates $currentLocation)
    {
        return $placesTable->findNearestPlacesOfCategory($currentLocation, $category);
    }
}
