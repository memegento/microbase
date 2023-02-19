<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\ImportExport\Model\Import;

// phpcs:disable Magento2.Classes.AbstractApi
/**
 * Data source with columns for Magento_ImportExport
 *
 * @api
 * @since 100.0.2
 */
abstract class AbstractSource implements \SeekableIterator
{
    public const ERROR_CODE_SYSTEM_EXCEPTION = 'systemException';
    public const ERROR_CODE_COLUMN_NOT_FOUND = 'columnNotFound';
    public const ERROR_CODE_COLUMN_EMPTY_HEADER = 'columnEmptyHeader';
    public const ERROR_CODE_COLUMN_NAME_INVALID = 'columnNameInvalid';
    public const ERROR_CODE_ATTRIBUTE_NOT_VALID = 'attributeNotInvalid';
    public const ERROR_CODE_DUPLICATE_UNIQUE_ATTRIBUTE = 'duplicateUniqueAttribute';
    public const ERROR_CODE_ILLEGAL_CHARACTERS = 'illegalCharacters';
    public const ERROR_CODE_INVALID_ATTRIBUTE = 'invalidAttributeName';
    public const ERROR_CODE_WRONG_QUOTES = 'wrongQuotes';
    public const ERROR_CODE_COLUMNS_NUMBER = 'wrongColumnsNumber';
    public const ERROR_EXCEEDED_MAX_LENGTH = 'exceededMaxLength';
    public const ERROR_INVALID_ATTRIBUTE_TYPE = 'invalidAttributeType';
    public const ERROR_INVALID_ATTRIBUTE_OPTION = 'absentAttributeOption';

    /**
     * @var array
     */
    protected $_colNames = [];

    /**
     * Quantity of columns
     *
     * @var int
     */
    protected $_colQty;

    /**
     * Current row
     *
     * @var array
     */
    protected $_row = [];

    /**
     * Current row number
     *
     * -1 means "out of bounds"
     *
     * @var int
     */
    protected $_key = -1;

    /**
     * @var bool
     */
    protected $_foundWrongQuoteFlag = false;

    /**
     * Get and validate column names
     *
     * @param array $colNames
     * @throws \InvalidArgumentException
     */
    public function __construct(array $colNames)
    {
        if (empty($colNames)) {
            throw new \InvalidArgumentException('Empty column names');
        }
        if (count(array_unique($colNames)) != count($colNames)) {
            throw new \InvalidArgumentException('Duplicates found in column names: ' . var_export($colNames, 1));
        }
        $this->_colNames = $colNames;
        $this->_colQty = count($colNames);
    }

    /**
     * Column names getter.
     *
     * @return array
     */
    public function getColNames()
    {
        return $this->_colNames;
    }

    /**
     * Return the current element
     *
     * Returns the row in associative array format: array(<col_name> => <value>, ...)
     *
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function current()
    {
        $row = $this->_row;
        if (count($row) != $this->_colQty) {
            if ($this->_foundWrongQuoteFlag) {
                throw new \InvalidArgumentException(self::ERROR_CODE_WRONG_QUOTES);
            } else {
                throw new \InvalidArgumentException(self::ERROR_CODE_COLUMNS_NUMBER);
            }
        }
        return array_combine($this->_colNames, $row);
    }

    /**
     * Move forward to next element (\Iterator interface)
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function next()
    {
        $this->_key++;
        $row = $this->_getNextRow();
        if (false === $row || [] === $row) {
            $this->_row = [];
            $this->_key = -1;
        } else {
            $this->_row = $row;
        }
    }

    /**
     * Render next row
     *
     * Return array or false on error
     *
     * @return array|false
     */
    abstract protected function _getNextRow();

    /**
     * Return the key of the current element (\Iterator interface)
     *
     * @return int -1 if out of bounds, 0 or more otherwise
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
        return $this->_key;
    }

    /**
     * Checks if current position is valid (\Iterator interface)
     *
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function valid()
    {
        return -1 !== $this->_key;
    }

    /**
     * Rewind the \Iterator to the first element (\Iterator interface)
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function rewind()
    {
        $this->_key = -1;
        $this->_row = [];
        $this->next();
    }

    /**
     * Seeks to a position (Seekable interface)
     *
     * @param int $position The position to seek to 0 or more
     * @return void
     * @throws \OutOfBoundsException
     */
    #[\ReturnTypeWillChange]
    public function seek($position)
    {
        if ($position == $this->_key) {
            return;
        }
        if (0 == $position || $position < $this->_key) {
            $this->rewind();
        }
        if ($position > 0) {
            do {
                $this->next();
                if ($this->_key == $position) {
                    return;
                }
            } while ($this->_key != -1);
        }
        throw new \OutOfBoundsException('Please correct the seek position.');
    }
}
