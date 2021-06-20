<?php

namespace Modules\Media\Eloquent;

use Modules\Media\Entities\Media;

trait HasMedia
{
    /**
     * The "booting" method of the trait.
     *
     * @return void
     */
    public static function bootHasMedia()
    {
        static::saved(function ($entity) {
            $entity->syncMedia(request('media', []));
        });
    }

    /**
     * Get all of the Media for the entity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function media()
    {
        return $this->morphToMany(Media::class, 'entity', 'entity_media')
            ->withPivot(['id', 'zone'])
            ->withTimestamps();
    }

    /**
     * Filter files by zone.
     *
     * @param string $zone
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function filterMedia($zone)
    {
        return $this->media()->wherePivot('zone', $zone);
    }

    /**
     * Sync media for the entity.
     *
     * @param array $media
     */
    public function syncMedia($media = [])
    {
        $entityType = get_class($this);

        foreach ($media as $zone => $fileIds) {
            $syncList = [];

            foreach (array_wrap($fileIds) as $fileId) {
                if (! empty($fileId)) {
                    $syncList[$fileId]['zone'] = $zone;
                    $syncList[$fileId]['entity_type'] = $entityType;
                }
            }

            $this->filterMedia($zone)->detach();
            $this->filterMedia($zone)->attach($syncList);
        }
    }
}
