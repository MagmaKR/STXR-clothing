<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockManagement extends Model
{
    /** @use HasFactory<\Database\Factories\StockManagementFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'quantity',
        'low_stock_threshold',
        'status',
        'last_restock_date',
    ];

    protected $casts = [
        'last_restock_date' => 'datetime',
    ];

    /**
     * Decrease the stock quantity by a given amount
     */
    public function decreaseStock(int $amount = 1): bool
    {
        if ($this->quantity >= $amount) {
            $this->quantity -= $amount;
            
            // Update status based on new quantity
            $this->updateStockStatus();
            
            return $this->save();
        }
        
        return false;
    }

    /**
     * Increase the stock quantity by a given amount
     */
    public function increaseStock(int $amount = 1): bool
    {
        $this->quantity += $amount;
        $this->last_restock_date = now();
        
        // Update status based on new quantity
        $this->updateStockStatus();
        
        return $this->save();
    }

    /**
     * Update the stock status based on current quantity
     */
    private function updateStockStatus(): void
    {
        if ($this->quantity <= 0) {
            $this->status = 'out_of_stock';
        } elseif ($this->quantity <= $this->low_stock_threshold) {
            $this->status = 'low_stock';
        } else {
            $this->status = 'in_stock';
        }
    }

    /**
     * Check if the product is in stock
     */
    public function isInStock(): bool
    {
        return $this->quantity > 0;
    }

    /**
     * Get the product that owns the stock
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the color that owns the stock
     */
    public function color(): BelongsTo
    {
        return $this->belongsTo(Colors::class);
    }

    /**
     * Get the size that owns the stock
     */
    public function size(): BelongsTo
    {
        return $this->belongsTo(Sizes::class);
    }
}
