<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $name
 * @property string|null $content
 * @property float|null $price
 * @property int|null $mass
 * @property int|null $percent
 * @property string|null $meat
 * @property string|null $img
 * @property string|null $keywords
 * @property string|null $description
 *
 * @property Category $category
 */
class Product extends ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'mass', 'percent'], 'integer'],
            [['content'], 'string'],
            [['price'], 'number'],
            [['name', 'meat', 'img', 'keywords', 'description'], 'string', 'max' => 256],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Вид пельменей'),
            'name' => Yii::t('app', 'Название'),
            'content' => Yii::t('app', 'Описание'),
            'price' => Yii::t('app', 'Цена'),
            'mass' => Yii::t('app', 'Объем пачки'),
            'percent' => Yii::t('app', 'Процент мяса'),
            'meat' => Yii::t('app', 'Выбор мяса'),
            'img' => Yii::t('app', 'Изображение'),
            'keywords' => Yii::t('app', 'Keywords'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function upload()
    {
        if ($this->validate()) {
//            VarDumper::dump($this->imageFile, 10, 1);
            $this->img = '/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->save();
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
