<?php

namespace App\Http\Controllers;

use App\Entities\PageEntity;
use App\Entities\PageType;
use App\Entities\Page;
use Illuminate\Http\Request;
use App\Entities\PageEntityGallery;
use App\Services\AfrikaEventService;
use function PHPSTORM_META\map;


class WebsiteController extends Controller
{
    /**
     * Get Pages structure
     *
     * @return mixed
     */


    protected $afrika;
    public function __construct(AfrikaEventService $service) {
        $this->afrika = $service;
    }
    /**
     * Get Pages structure
     *
     * @return mixed
     */
    public function pages(){

        $pages = Page::get()->toHierarchy();

        return $pages;
    }
    

    public function getUpcomingEvents(Request $request) {

        $request->input('global');

        $months = array();
        $dates = array();
        $many = array();
        $index = -1;
        //print_r($request->input('global'));
        // foreach ($request->input('global') as $key => $value){
        //     $pageType = PageType::with(['entities' => function ($query) use ($value) {
        //         $query->orderBy('order', 'desc');
        //         $query->select(['id', 'slugable', 'type_id']);
        //         if($value['limit'] != "all"){
        //             $query->limit($value['limit']);
        //         }

        //     }, 'entities.collections' => function ($query) {
        //         $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
        //     }])->where('slug' , $value['type'])->get(['id', 'name', 'type', 'slug']);
        // }

        // $m = array();

        foreach ($request->input('global') as $key => $value){
            $pageType = PageType::with(['entities' => function ($query) use ($value) {
                $query->orderBy('order', 'desc');
                $query->select(['id', 'slugable', 'type_id']);
                if($value['limit'] != "all"){
                    $query->limit($value['limit']);
                }
            }, 'entities.collections' => function ($query) {
                $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
            }])->where('slug' , $value['type'])->get(['id', 'name', 'type', 'slug']);
        }

        


        foreach ($pageType as $key => $value){
            // $index += 1;
            // $newObject = array($value->slug => []);
            // array_push($many, $newObject);


            $months_before['start_date'] = array();
            $months_before['end_date'] = array();
            foreach ($value->entities as $entity) {
                $coll = $entity->collections;
                
                $formPost = $coll->reduce(function ($formPost, $coll) {
                    $formPost[$coll['field_name']] = $coll['value'];
                    
                    return $formPost;

                }, []);

            
                $dates = ['start_date', 'end_date'];
               
                for($i=0; $i < count($dates); $i++) {
                    $date = explode(" ", $formPost[$dates[$i]]);

                    $date = $date[1] . " " . $date[2] . " " . $date[3];
                    $d = $this->afrika->changeDateFormat($date);

                    
                    array_push($months_before[$dates[$i]], $d);    

                }

                
                
                $period = $this->afrika->tripiPerDateRange($months_before['start_date'][0], $months_before['end_date'][0]);
                $result = [];
     
                foreach($period as $month){
                     $result =  $month->format("F Y") ;
                     
                     
                    array_push($months, $result);
                }

                $months_before['start_date'] = array();
                $months_before['end_date'] = array();


                array_push($many, ["id" => $entity->id, "slugable" => $entity->slugable, "collections" => $formPost]);     

                //["id" => $entity->id, "slugable" => $entity->slugable, "collections" => $formPost]      
                // array_push($many[$index][$value->slug], ["id" => $entity->id, "slugable" => $entity->slugable, "collections" => $formPost]);     

            }



            


    }

   

        

        usort($months, array($this->afrika, 'sortMonths'));


            $months = array_unique($months);

            //after call unique
            $monthsUnique = array();
            foreach($months as $value) {                             

                $months = $value;         
                array_push($monthsUnique, $value);
            }


        
             

        //print_r($many[0]['end_date']);
        foreach($monthsUnique as $month) {
            $m = strtotime($month);
            $now = date("F Y");
            $date=date_create($now);
            $date = date_modify($date,"-1 month");
            $now= date_format($date,"F Y");
            if(strtotime($now) < $m) {
                $event[$month] = array();   
            }                     
        }


        foreach($many as $key => $m) {
            $start_date = explode(" ", $m['collections']['start_date']);
            $start_date = $start_date[1] . " " . $start_date[3];

            $start_date = $this->afrika->changeDateFormat($start_date);

            
            $end_date = explode(" ", $m['collections']['end_date']);
            $end_date = $end_date[1] . " " . $end_date[3];

            $end_date = $this->afrika->changeDateFormat($end_date);
            

            // Make Past events unavailable
            $s_date = explode(" ", $m['collections']['start_date']);
            $m['collections']['start_date'] = $s_date[2] . ' ' . $s_date[1] . ' ' . $s_date[3];
            $s_date = strtotime($m['collections']['start_date']);


            // end date
            $e_date = explode(" ", $m['collections']['end_date']);
            $m['collections']['end_date'] = $e_date[2] . ' ' . $e_date[1] . ' ' . $e_date[3];
            $e_date = strtotime($m['collections']['end_date']);
            $now = strtotime(date("d M Y"));


                     
    
            $daterange = $this->afrika->tripiPerDateRange($start_date, $end_date);

            $result = [];

            foreach($daterange as $date){
                $result =  $date->format("F Y") ;

                foreach($monthsUnique as $month) {

                    if($result == $month && $now < $e_date) {
                        if(array_key_exists($month, $event)) {
                            array_push($event[$month], ["collections" => $m['collections'], "slugable" => $m['slugable']]);
                        } 
                    } 

                }    
            }
          
        }
      

        $global = array(
            "upcoming_events" => $monthsUnique,
        );



        return array("upcoming_events" => $event);
    }

    public function getPastEvents(Request $request) {

        $request->input('global');

        $months = array();
        $dates = array();
        $many = array();
        $event = array();
        $index = -1;

        // foreach ($request->input('global') as $key => $value){
        //     $pageType = PageType::with(['entities' => function ($query) use ($value) {
        //         $query->orderBy('order', 'desc');
        //         $query->select(['id', 'slugable', 'type_id']);
        //         if($value['limit'] != "all"){
        //             $query->limit($value['limit']);
        //         }
        //     }, 'entities.collections' => function ($query) {
        //         $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
        //     }])->where('slug' , $value['type'])->get(['id', 'name', 'type', 'slug']);
        // }
        foreach($request->input('global') as $key => $value) {

            if($key == 'year') {                
                $year = $value['year'];
            }

            $pageType = PageType::with(['entities' => function ($query) use ($value) {
                $query->orderBy('order', 'desc');
                $query->select(['id', 'slugable', 'type_id']);
                if($value['limit'] != "all") {
                    $query->limit($value['limit']);
                }
            }, 'entities.collections' => function ($query) {
                $query->select(['entity_id', 'value', 'field_name', 'field_type', 'field_id']);
            } ])->get();
        }

        foreach($pageType as $key => $value) {
            foreach ($value->entities as $entity) {
                $coll = $entity->collections;
                
            

               
                $formPost = $coll->reduce(function ($formPost, $coll) {

                        $formPost[$coll['field_name']] = $coll['value'];                            
                        return $formPost; 
                          
                }, []);
             

                // show by specifing year
                foreach($formPost as $key => $val) {

                    if($key == 'start_date') {

                        if(strpos($val, $year)) {
                           array_push($event, $formPost);  
                        }
                    }
                }   


                       

            }

        }

   

        

       

      



        return array("upcoming_events" => $event);
    }


    public function globalRequest (Request $request){

        $one = array();
        $many = array();

        $index = -1;
        foreach ($request->input('global') as $key => $value){
            $pageType = PageType::with(['entities' => function ($query) use ($value) {
                $query->orderBy('order', 'desc');
                $query->select(['id', 'slugable', 'type_id']);
                if($value['limit'] != "all"){
                    $query->limit($value['limit']);
                }

            }, 'entities.collections' => function ($query) {
                $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
            }])->where('slug' , $value['type'])->get(['id', 'name', 'type', 'slug']);


            foreach ($pageType as $key => $value){

                if ($value->type == "one") {
                    $coll = $value->entities[0]->collections;

                    $formPost = $coll->reduce(function ($formPost, $coll) {
                        if($coll['field_type'] == "gallery"){
                            $gallery = PageEntityGallery::with(['images' => function ($query) {
                                $query->orderBy('order', 'desc');
                            }])->where('field_id', $coll['field_id'])->where('entity_id', $coll['entity_id'])->first();
                            $formPost[$coll['field_name']] = $gallery->images;
                            return $formPost;
                        }
                        $formPost[$coll['field_name']] = $coll['value'];
                        return $formPost;
                    }, []);

                    $one[0][$value->slug] = ["id" => $value->entities[0]->id, "slugable" =>$value->entities[0]->slugable, "collections" => $formPost];
                }else {
                    $index += 1;
                    $newObject = array($value->slug => []);
                    array_push($many, $newObject);
                    foreach ($value->entities as $entity) {
                        $coll = $entity->collections;

                        $formPost = $coll->reduce(function ($formPost, $coll) {
                            if($coll['field_type'] == "gallery"){
                                $gallery = PageEntityGallery::with(['images' => function ($query) {
                                    $query->orderBy('order', 'desc');
                                }])->where('field_id', $coll['field_id'])->where('entity_id', $coll['entity_id'])->first();
                                $formPost[$coll['field_name']] = $gallery->images;
                                return $formPost;
                            }
                            $formPost[$coll['field_name']] = $coll['value'];
                            return $formPost;
                        }, []);

                        array_push($many[$index][$value->slug], ["id" => $entity->id, "slugable" => $entity->slugable, "collections" => $formPost]);


                    }
                }
            }

        }

        $global = array(
            "one" => $one,
            "many" =>$many
        );



        return array("global" => $global);
    }

    /**
     * Get Modules for an Page
     *
     * @param $slug
     * @return array
     */
    public function modules($slug){

        $one = array();
        $many = array();

        $page = Page::where('slug', $slug)->first();

        $pageType = PageType::with(['entities' => function ($query) {
            $query->orderBy('order', 'desc');
            $query->select(['id', 'slugable', 'type_id']);
        }, 'entities.collections' => function ($query) {
            $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
        }])->where('page_id' , $page->id)->get(['id', 'name', 'type', 'slug']);

        $index = -1;
        foreach ($pageType as $key => $value){

            if($value->entities != null && $value->type == 'one') {

                $coll = $value->entities[0]->collections;

                $formPost = $coll->reduce(function ($formPost, $coll) {
                    if($coll['field_type'] == "gallery"){
                        $gallery = PageEntityGallery::with(['images' => function ($query) {
                            $query->orderBy('order', 'desc');
                        }])->where('field_id', $coll['field_id'])->where('entity_id', $coll['entity_id'])->first();
                        $formPost[$coll['field_name']] = $gallery->images;
                        return $formPost;
                    }
                    $formPost[$coll['field_name']] = $coll['value'];
                    return $formPost;
                }, []);

                $one[$value->slug] = ["collections" => $formPost];
            }else if($value->entities != [] && $value->type = "many"){
                $index += 1;
                $newObject  = array($value->slug => []);
                array_push($many, $newObject);
                foreach ($value->entities as $entity){



                    $coll = $entity->collections;
//
                    $formPost = $coll->reduce(function ($formPost, $coll) {

                        $formPost[$coll['field_name']] = $coll['value'];
                        return $formPost;
                    }, []);


//
                    array_push($many[$index][$value->slug], ["id" => $entity->id, "slugable" =>$entity->slugable, "collections" => $formPost]);


                }

            }

        }

        return array("one" => $one, "many" => $many);
    }

    /*
     * Find Module By Id
     */
    public function moduleById($id, $slug){

        $entityID = array(
            "entity" => []
        );
        $entity = PageEntity::with('collections')->find($id);

        $coll = $entity->collections;

        $formPost = $coll->reduce(function ($formPost, $coll) {
            if($coll['field_type'] == "gallery"){
                $gallery = PageEntityGallery::with(['images' => function ($query) {
                    $query->orderBy('order', 'desc');
                }])->where('field_id', $coll['field_id'])->where('entity_id', $coll['entity_id'])->first();
                $formPost[$coll['field_name']] = $gallery->images;
                return $formPost;
            }
            $formPost[$coll['field_name']] = $coll['value'];
            return $formPost;
        }, []);

        array_push($entityID['entity'], ["id" => $entity->id, "slugable" =>$entity->slugable, "collections" => $formPost]);


        return $entityID;
    }

    public function bladePageRedirect($slug){

        $one = array();
        $many = array();
        $page = Page::where('slug', $slug)->first();
        $pageType = PageType::with(['entities' => function ($query) {
            $query->orderBy('order', 'desc');
            $query->select(['id', 'slugable', 'type_id']);
        }, 'entities.collections' => function ($query) {
            $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
        }])->where('page_id' , $page->id)->get(['id', 'name', 'type', 'slug']);
        $index = -1;
        foreach ($pageType as $key => $value){
            if($value->entities != null && $value->type == "one") {
                if(isset($value->entities[0])) {
                    $coll = $value->entities[0]->collections;
                    $formPost = $coll->reduce(function ($formPost, $coll) {
                        if ($coll['field_type'] == "gallery") {
                            $gallery = PageEntityGallery::with(['images' => function ($query) {
                                $query->orderBy('order', 'desc');
                            }])->where('field_id', $coll['field_id'])->where('entity_id', $coll['entity_id'])->first();
                            $formPost[$coll['field_name']] = $gallery->images;
                            return $formPost;
                        }
                        $formPost[$coll['field_name']] = $coll['value'];
                        return $formPost;
                    }, []);
                    $one[$value->slug] = ["collections" => $formPost];
                }
            }else if($value->entities != [] && $value->type = "many"){
                $index += 1;
                $newObject  = array($value->slug => []);
                array_push($many, $newObject);
                foreach ($value->entities as $entity){



                    $coll = $entity->collections;
//
                    $formPost = $coll->reduce(function ($formPost, $coll) {
                        $formPost[$coll['field_name']] = $coll['value'];
                        return $formPost;
                    }, []);
//
                    array_push($many[$index][$value->slug], ["id" => $entity->id, "slugable" =>$entity->slugable, "collections" => $formPost]);
                }
            }
        }

        return view('pages.'.$slug, array('one' => $one, 'many' => $many));
    }

    public function bladePageDetails($slug, $id, $slugable){
        $entityID = array(
            "entity" => []
        );
        $entity = PageEntity::with('collections')->find($id);
        $coll = $entity->collections;
        $formPost = $coll->reduce(function ($formPost, $coll) {
            if($coll['field_type'] == "gallery"){
                $gallery = PageEntityGallery::with(['images' => function ($query) {
                    $query->orderBy('order', 'desc');
                }])->where('field_id', $coll['field_id'])->where('entity_id', $coll['entity_id'])->first();
                $formPost[$coll['field_name']] = $gallery->images;
                return $formPost;
            }
            $formPost[$coll['field_name']] = $coll['value'];
            return $formPost;
        }, []);
        array_push($entityID['entity'], ["id" => $entity->id, "slugable" =>$entity->slugable, "collections" => $formPost]);

        return view('innerpages.'.$slug, array('entity' => $entityID['entity']));
    }
}