<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_CreateTenantsTable extends Migration
{
    public function up()
    {
        // Create Tenants Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tenant_id' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'domain' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'subscription_status' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => 'active',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tenants');

        // Add tenant_id to existing tables
        $tables = [
            'app_config',
            'attribute_links',
            'attributes',
            'cashups',
            'customers',
            'customers_packages',
            'employees',
            'expenses',
            'expenses_categories',
            'giftcards',
            'grants',
            'inventory',
            'item_kit_items',
            'item_kits',
            'item_quantities',
            'items',
            'items_taxes',
            'lunch_menus',
            'modules',
            'people',
            'permissions',
            'receivings',
            'receivings_items',
            'sales',
            'sales_items',
            'sales_items_taxes',
            'sales_payments',
            'sales_reward_points',
            'sales_taxes',
            'sessions',
            'suppliers',
            'tax_categories',
            'tax_codes',
            'tax_jurisdictions'
        ];

        // Note: We are adding tenant_id as a nullable column first to avoid breaking existing data immediately.
        // In a real migration, we might want to default it or backfill it.
        $fields = [
            'tenant_id' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ];

        foreach ($tables as $table) {
            if ($this->db->tableExists($table)) {
                if (!$this->db->fieldExists('tenant_id', $table)) {
                    $this->forge->addColumn($table, $fields);
                }
            }
        }

        // Enable RLS (Postgres specific - raw SQL)
        // CodeIgniter Forge doesn't support RLS natively, so we use raw SQL.
        // We only try this if the driver is Postgre
        if ($this->db->DBDriver === 'Postgre') {
            $this->db->query("ALTER TABLE tenants ENABLE ROW LEVEL SECURITY;");
            foreach ($tables as $table) {
                if ($this->db->tableExists($table)) {
                    $this->db->query("ALTER TABLE $table ENABLE ROW LEVEL SECURITY;");
                }
            }
        }
    }

    public function down()
    {
        $this->forge->dropTable('tenants');

        $tables = [
            'app_config',
            'attribute_links',
            'attributes',
            'cashups',
            'customers',
            'customers_packages',
            'employees',
            'expenses',
            'expenses_categories',
            'giftcards',
            'grants',
            'inventory',
            'item_kit_items',
            'item_kits',
            'item_quantities',
            'items',
            'items_taxes',
            'lunch_menus',
            'modules',
            'people',
            'permissions',
            'receivings',
            'receivings_items',
            'sales',
            'sales_items',
            'sales_items_taxes',
            'sales_payments',
            'sales_reward_points',
            'sales_taxes',
            'sessions',
            'suppliers',
            'tax_categories',
            'tax_codes',
            'tax_jurisdictions'
        ];

        foreach ($tables as $table) {
            if ($this->db->tableExists($table)) {
                if ($this->db->fieldExists('tenant_id', $table)) {
                    $this->forge->dropColumn($table, 'tenant_id');
                }
            }
        }
    }
}
